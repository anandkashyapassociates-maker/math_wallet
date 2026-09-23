<?php

namespace App\Console\Commands;

use App\Models\MemberDetail;
use App\Models\RoiLevelIncome;
use App\Models\StakingIncome;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:roi-level-income-dis')]
#[Description('Command description')]
class RoiLevelIncomeDis extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $incomes = StakingIncome::where('level_status', 0)->get();
        foreach ($incomes as $value) {
            $memberid = $value['memberid'];
            $name = getName($memberid);
            $share = $value['amount'];
            $sponsorid = getSponsorid($memberid);
            $limit = 11;
            for ($i = 1; $i < $limit; $i++) {
                $level = $i;

                if ($sponsorid != 'Root') {

                    $var = MemberDetail::where('memberid', $sponsorid)->first();
                    $status = $var->status;
                    $downline = $var->downline;

                    if ($status == 'Active') {
                        $rate = levelRate($level);
                        $amount = $share * $rate / 100;

                        if ($amount > 0) {
                            $insert = new RoiLevelIncome;
                            $insert->memberid = $sponsorid;
                            $insert->level = $level;
                            $insert->level_id = $memberid;
                            $insert->amount = $amount;
                            $insert->rate = $rate;
                            $insert->staking_income = $share;
                            $insert->name = $name;
                            $insert->type = 'Staking';

                            if ($level == 1 && $downline >= 0 || $level == 2 && $downline >= 1 || $level == 3 && $downline >= 2 || $level == 4 && $downline >= 3 || $level == 5 && $downline >= 4 || $level == 6 && $downline >= 5 || $level == 7 && $downline >= 6 || $level == 8 && $downline >= 7 || $level == 9 && $downline >= 8 || $level == 10 && $downline >= 9) {

                                $insert->status = 'Paid';
                                $wallet = $var->wallet;
                                $var->wallet += $amount;
                                $var->save();

                                walletTransfer($sponsorid, $amount, 'debit', $wallet, 'Staking Level Income', ''.$i.' Staking Level Income Amount Added into wallet.');
                                $insert->status = 'Paid';
                            } else {
                                $insert->status = 'Flushed';
                            }
                            $insert->save();
                        }
                    }

                    $inc = MemberDetail::where('memberid', $sponsorid)->first();
                    $sponsorid = $inc['sponsorid'];
                } else {
                    break;
                }
            }
            $update = StakingIncome::where('id', $value['id'])->update(['level_status' => 1]);
        }
    }
}
