<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\MemberDetail;
use App\Models\WithdrawalRequest;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Tests\TestCase;

class PepeRedeemTest extends TestCase
{
    public function test_pepe_redeem_submission_and_admin_accept_reject_flow(): void
    {
        $this->withoutMiddleware(PreventRequestForgery::class);

        $memberId = 'PEPETEST'.rand(1000, 9999);
        $walletAddr = '0x1234567890abcdef1234567890abcdef12345678';
        $member = MemberDetail::create([
            'memberid' => $memberId,
            'name' => 'Pepe Holder',
            'mobile' => '9812345678',
            'email' => 'pepe'.rand(100, 999).'@example.com',
            'password' => bcrypt('password'),
            'member_wallet' => $walletAddr,
            'pepe_wallet' => 2000,
        ]);

        // 1. Submit redeem for 1000 tokens
        $res = $this->withSession(['MEMBER_ID' => $memberId])
            ->postJson('/member/pepe/redeem', [
                'amount' => 1000,
                'wallet_address' => $walletAddr,
            ]);

        $res->assertStatus(200)->assertJson(['success' => true]);

        $member->refresh();
        $this->assertEquals(1000, $member->pepe_wallet);

        $this->assertDatabaseHas('withdrawal_requests', [
            'memberid' => $memberId,
            'wallet_address' => $walletAddr,
            'gross_amount' => 1000,
            'type' => 'PEPE',
            'status' => 'Pending',
        ]);

        $req = WithdrawalRequest::where('memberid', $memberId)->where('type', 'PEPE')->first();

        // 2. Prevent duplicate while pending
        $resDup = $this->withSession(['MEMBER_ID' => $memberId])
            ->postJson('/member/pepe/redeem', [
                'amount' => 500,
                'wallet_address' => $walletAddr,
            ]);
        $resDup->assertStatus(422);

        // 3. Admin rejects -> tokens refunded
        $admin = Admin::first();
        $resReject = $this->withSession(['ADMIN_LOGIN' => true, 'admin_id' => $admin ? $admin->id : 1])
            ->get('/admin/withdrawal/cancel/'.$req->id);

        $resReject->assertStatus(302);
        $req->refresh();
        $this->assertEquals('Cancelled', $req->status);

        $member->refresh();
        // 1000 + 1000 refund = 2000
        $this->assertEquals(2000, $member->pepe_wallet);

        // Verify Cancelled Request page has this PEPE request in pepeData
        $resCancelledPage = $this->withSession(['ADMIN_LOGIN' => true, 'admin_id' => $admin ? $admin->id : 1])
            ->get('/admin/cancelled-request');
        $resCancelledPage->assertStatus(200);
        $resCancelledPage->assertSee($memberId);
        $resCancelledPage->assertSee('Refunded to Wallet');

        // 4. Submit redeem again and Admin accepts
        $res2 = $this->withSession(['MEMBER_ID' => $memberId])
            ->postJson('/member/pepe/redeem', [
                'amount' => 2000,
                'wallet_address' => $walletAddr,
            ]);
        $res2->assertStatus(200);

        $req2 = WithdrawalRequest::where('memberid', $memberId)
            ->where('type', 'PEPE')
            ->where('status', 'Pending')
            ->first();

        $resAccept = $this->withSession(['ADMIN_LOGIN' => true, 'admin_id' => $admin ? $admin->id : 1])
            ->get('/admin/withdrawal/accept/'.$req2->id);

        $resAccept->assertStatus(302);
        $req2->refresh();
        $this->assertEquals('Approved', $req2->status);

        // Verify Payment History page has this PEPE request in pepeData
        $resHistoryPage = $this->withSession(['ADMIN_LOGIN' => true, 'admin_id' => $admin ? $admin->id : 1])
            ->get('/admin/payment-history');
        $resHistoryPage->assertStatus(200);
        $resHistoryPage->assertSee($memberId);

        // Cleanup
        $member->delete();
        WithdrawalRequest::where('memberid', $memberId)->delete();
    }
}
