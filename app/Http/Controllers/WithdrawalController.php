<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\MemberDetail;
use App\Models\SingleLegIncome;
use App\Models\WalletTransfer;
use App\Models\WithdrawalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawalController extends Controller
{
    public function mainWallets()
    {
        $memberid = session('MEMBER_ID');
        $country = session('country');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['country'] = Country::where('name', $country)->first();
        $result['wdata'] = WithdrawalRequest::where('memberid', $memberid)->get();

        return view('member.wallet.main-wallet')->with($result);
    }

    public function balValidate(Request $request)
    {
        $memberid = $request->post('memberid');
        $withAmount = $request->post('withAmount');
        // $txn_password = $request->post('txn_password');

        $result = MemberDetail::where('memberid', $memberid)->first();
        if ($result) {
            $balance = $result->wallet;
            $rank_status = $result->rank_status;

            if ($rank_status == 3) {
                $check = SingleLegIncome::where([['memberid', $memberid], ['level', 3]])->first();
                $date = $check->created_at;
                if (isset($check) && number_format($date->diffInDays(now()), 0) > 15) {
                    return response()->json([
                        'code' => 2,
                        'data' => 'please create a Staking for withdraw your fund.',
                    ]);
                }
            }
            if ($balance >= $withAmount) {
                // if (Hash::check($txn_password, $result->txn_password)) {
                return response()->json([
                    'code' => 1,
                    'data' => $withAmount * 100 / 100,
                ]);
                // } else {
                //     return response()->json([
                //         'code' => 3,
                //         'data' => 0
                //     ]);
                // }
            } else {
                return response()->json([
                    'code' => 0,
                    'data' => 0,
                ]);
            }
        }
    }

    public function getPrivateKey(Request $request)
    {
        return response()->json([
            'code' => 0,
            'data' => 'd24e79c6af7fac60ab730094159fad5664300d5559f8c53ec8a',
        ]);
    }

    // public function initWithdrawal(Request $request)
    // {
    //     $request->validate([
    //         'memberid' => 'required',
    //         'amount' => 'required|numeric|min:10',
    //     ]);
    //     $amount = $request->post('amount');
    //     $memberid = $request->post('memberid');
    //     $txnid = $request->post('txnid');

    //     $memberData = MemberDetail::where('memberid', $memberid)->first();
    //     $Status = $memberData['status'];
    //     $wallet = $memberData['wallet'];

    //     if ($amount < 10) {
    //         session()->flash('failedMsg', 'Invalid Amount Entered. Amount must be equal and greater than $10');

    //         return redirect()->back();
    //     }

    //     if ($amount > $wallet) {
    //         session()->flash('failedMsg', 'Invalid Amount Entered. Amount can not be greater than wallet balance');

    //         return redirect()->back();
    //     }

    //     if ($Status != 'Active') {
    //         session()->flash('failedMsg', 'Your Account is not Active. Plase activate your account to withdraw money');

    //         return redirect()->back();
    //     }

    //     $service = ($amount * 15) / 100;
    //     $netAmount = $amount - $service;
    //     $date = date('Y-m-d H:i:s');
    //     $requestid = 'RQ'.time();

    //     $check = WithdrawalRequest::where('request_id', $requestid)->first();
    //     if (! $check) {
    //         $mem = MemberDetail::where('memberid', $memberid)->first();
    //         $memberid = $mem->memberid;
    //         $wallet = $mem->wallet;
    //         $mem->wallet -= $amount;
    //         $mem->save();

    //         $var = new WithdrawalRequest;
    //         $var->request_date = date('Y-m-d H:i:s');
    //         $var->request_id = $requestid;
    //         $var->txnid = $txnid;
    //         $var->memberid = $memberid;
    //         $var->wallet_address = $mem->member_wallet;
    //         $var->gross_amount = $amount;
    //         $var->service_charge = $service;
    //         $var->net_amount = $netAmount;
    //         $var->save();

    //         walletTransfer($memberid, $amount, 'credit', $wallet, 'Withdrawal', ' $ '.$amount.' have been withdrawn by Member from wallet. Payment Id-'.$var->id);

    //         session()->flash('successMsg', 'Withdrawal request has been created successfully. Amount will be transfered into wallet after transaction validation');

    //         return redirect()->back();
    //     }
    // }

    public function withdrawal(Request $request)
    {
        $memberWallet = $request->post('memberWallet');
        $memberid = $request->post('memberid');
        $txnid = $request->post('txnid');
        $amount = $request->post('amount');

        // $totalAmount = $amount / 85 * 100;
        // $usdtAmount = $totalAmount;
        $service = $amount / 100 * 15;
        $netAmount = $amount - $service;
        $date = date('Y-m-d H:i:s');
        $requestid = "RQ" . time();

        $mem = MemberDetail::where('memberid', $memberid)->first();
        $wallet = $mem->wallet;
        $mem->wallet -= $amount;
        $mem->save();

        $var = new WithdrawalRequest();
        $var->request_date = $date;
        $var->payment_date = date('Y-m-d H:i:s');
        $var->request_id = $requestid;
        $var->txnid =  $txnid;
        $var->memberid = $memberid;
        // $var->name = $mem->name;
        $var->type = 'Online';
        $var->wallet_address = $memberWallet;
        $var->gross_amount =  $amount;
        $var->service_charge = $service;
        $var->net_amount = $netAmount;
        $var->status = 'Approved';
        $var->save();

        walletTransfer($memberid, $amount, 'credit', $wallet, 'Withdrawal', ' $ ' . $amount . ' have been withdrawn by Member from wallet. Payment Id-' . $var->id);
        // session()->flash('successMsg', 'Withdrawal request has been processed successfully. Amount has been added to wallet');
    }

    public function withdrlHistory()
    {
        $memberid = session('MEMBER_ID');
        $country = session('country');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['country'] = Country::where('name', $country)->first();
        $result['reqdata'] = WithdrawalRequest::where('memberid', $memberid)->orderBy('created_at', 'desc')->get();

        return view('member.wallet.withdrawal-history')->with($result);
    }

    public function walletTransfer()
    {
        $memberid = session('MEMBER_ID');
        $country = session('country');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['country'] = Country::where('name', $country)->first();
        $result['transdata'] = WalletTransfer::where([['memberid', $memberid], ['walletType', '!=', 'P2P Fund Transfer']])->orderBy('id', 'desc')->get();

        return view('member.wallet.wallet-transfer')->with($result);
    }

    public function wAcceptOnline($id)
    {
        $result['wdata'] = WithdrawalRequest::find($id);
        $memberid = $result['wdata']['memberid'];
        $option = $result['wdata']['payment_option'];
        $result['udata'] = MemberDetail::where('memberid', $memberid)->first();
        $result['wallet'] = $result['wdata']['wallet_address'];

        return view('admin.withdrawal-accept')->with($result);
    }

    public function withdrawalAccept(Request $request)
    {
        $id = $request->post('wid');
        $txnid = $request->post('txnid');
        $wallet = $request->post('wallet');

        $var = WithdrawalRequest::find($id);
        $var->txnid = $txnid;
        $var->wallet_address = $wallet;
        $var->status = 'Approved';
        $var->save();

        $memberid = $var->memberid;
        $qry = MemberDetail::where('memberid', $memberid)->first();

        withdrawalIncome($qry->sponsorid, $memberid, $qry->name, $id, 'Withdrawal Commission');

        return response()->json([
            'code' => 1,
        ]);
    }

    /**
     * Member Redeem PEPE Tokens to BEP-20 Wallet Address
     */
    public function redeemPepe(Request $request)
    {
        $memberid = session('MEMBER_ID');
        if (! $memberid) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please log in again.',
            ], 401);
        }

        $member = MemberDetail::where('memberid', $memberid)->first();
        if (! $member) {
            return response()->json([
                'success' => false,
                'message' => 'Member record not found.',
            ], 404);
        }

        // Available balance check
        $availablePepe = (float) ($member->pepe_wallet ?? 0);
        if ($availablePepe <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have any PEPE tokens in your wallet to redeem.',
            ], 422);
        }

        // Requested amount (default to all available or user-specified amount)
        $amount = $request->input('amount') !== null ? (float) $request->input('amount') : $availablePepe;
        if ($amount <= 0 || $amount > $availablePepe) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid redeem amount. Available balance is ' . number_format($availablePepe, 0) . ' PEPE.',
            ], 422);
        }

        // Check if member already has a pending PEPE redeem request
        $existingPending = WithdrawalRequest::where('memberid', $memberid)
            ->where('type', 'PEPE')
            ->where('status', 'Pending')
            ->first();

        if ($existingPending) {
            return response()->json([
                'success' => false,
                'message' => 'You already have a pending PEPE redeem request of ' . number_format($existingPending->gross_amount, 0) . ' PEPE. Please wait for admin approval.',
            ], 422);
        }

        // Wallet address determination
        $walletAddress = $request->input('wallet_address')
            ?: ($member->member_wallet ?: ($member->wallet_address ?: session('address')));

        if (empty($walletAddress)) {
            return response()->json([
                'success' => false,
                'message' => 'BEP-20 Wallet Address is required to receive PEPE tokens.',
            ], 422);
        }

        try {
            DB::transaction(function () use ($amount, $walletAddress, $memberid) {
                // Lock member row for update
                $memLock = MemberDetail::where('memberid', $memberid)->lockForUpdate()->first();
                if ($memLock->pepe_wallet < $amount) {
                    throw new \Exception('Insufficient PEPE tokens balance.');
                }

                // Deduct tokens
                $memLock->pepe_wallet -= $amount;
                $memLock->save();

                // Create Withdrawal Request
                $req = new WithdrawalRequest;
                $req->request_date = now();
                $req->request_id = 'PEPE' . date('ymd') . rand(1000, 9999);
                $req->memberid = $memberid;
                $req->wallet_address = $walletAddress;
                $req->gross_amount = $amount;
                $req->service_charge = 0;
                $req->net_amount = $amount;
                $req->type = 'PEPE';
                $req->status = 'Pending';
                $req->save();
            });

            $updatedMember = MemberDetail::where('memberid', $memberid)->first();

            return response()->json([
                'success' => true,
                'message' => 'Your redeem request for ' . number_format($amount, 0) . ' PEPE tokens has been submitted to admin successfully!',
                'new_balance' => $updatedMember->pepe_wallet,
                'redeemed_amount' => $amount,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'An error occurred while submitting redeem request.',
            ], 500);
        }
    }

    /**
     * Member PEPE Token Redeem History Page
     */
    public function pepeRedeemHistory(Request $request)
    {
        $memberid = session('MEMBER_ID');
        if (! $memberid) {
            return redirect('/member');
        }

        $country = session('country');
        $member = MemberDetail::where('memberid', $memberid)->first();
        $countryData = Country::where('name', $country)->first();

        // Statistics
        $availablePepe = (float) ($member->pepe_wallet ?? 0);
        $totalRedeemed = (float) WithdrawalRequest::where('memberid', $memberid)
            ->where('type', 'PEPE')
            ->where('status', 'Approved')
            ->sum('gross_amount');

        $pendingAmount = (float) WithdrawalRequest::where('memberid', $memberid)
            ->where('type', 'PEPE')
            ->where('status', 'Pending')
            ->sum('gross_amount');

        $pendingCount = WithdrawalRequest::where('memberid', $memberid)
            ->where('type', 'PEPE')
            ->where('status', 'Pending')
            ->count();

        $totalRequests = WithdrawalRequest::where('memberid', $memberid)
            ->where('type', 'PEPE')
            ->count();

        // Query history with optional status filter
        $status = $request->input('status');
        $query = WithdrawalRequest::where('memberid', $memberid)
            ->where('type', 'PEPE');

        if (! empty($status) && in_array($status, ['Pending', 'Approved', 'Cancelled'], true)) {
            $query->where('status', $status);
        }

        $redeemRequests = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();

        $data = $member;

        return view('member.wallet.pepe-redeem-history', compact(
            'data',
            'member',
            'countryData',
            'availablePepe',
            'totalRedeemed',
            'pendingAmount',
            'pendingCount',
            'totalRequests',
            'redeemRequests',
            'status'
        ));
    }
}
