<?php

namespace App\Http\Controllers;

use App\Models\AchiversImage;
use App\Models\Country;
use App\Models\DashMessage;
use App\Models\MemberDetail;
use App\Models\UplineMember;
use App\Models\WhatsappReferral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable as GlobalThrowable;

class MemberDetailController extends Controller
{
    public function dashboard(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $country = session('country');
        $result['country'] = Country::where('name', $country)->first();
        $result['data'] = MemberDetail::where([['memberid', $memberid], ['country', $country]])->first();
        $result['dashMsg'] = DashMessage::orderby('rank', 'asc')->get();
        $result['achieverImages'] = AchiversImage::orderBy('id', 'desc')->get();

        // WhatsApp Referral Promotion Statistics
        $today = now()->toDateString();
        $waTodayCount = WhatsappReferral::where('member_id', $memberid)
            ->whereDate('created_at', $today)
            ->count();
        $result['waTodayStatus'] = $waTodayCount > 0 ? 'Used' : 'Not Used';
        $result['waTotalReferrals'] = WhatsappReferral::where('member_id', $memberid)->count();
        $result['waTotalPepe'] = WhatsappReferral::where('member_id', $memberid)->sum('reward_amount');
        $lastWa = WhatsappReferral::where('member_id', $memberid)->latest('created_at')->first();
        $result['waLastDate'] = $lastWa ? $lastWa->created_at : null;
        $result['countries'] = Country::whereNotNull('phonecode')->where('phonecode', '!=', '')->orderBy('nicename', 'asc')->get();

        return view('member.dashboard')->with($result);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('address');
        $request->session()->forget('MEMBER_ID');
        $request->session()->forget('country');
        $request->session()->forget('userid');
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('mobile');

        return redirect('/');
    }

    public function memforgetPassword()
    {
        return view('member.forget-password');
    }

    public function insertPdata(Request $request)
    {
        // print_r($request->post());
        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required',
            'mobile' => 'required',
            // 'dob' => 'required',
            // 'gender' => 'required',
            'email' => 'required|email',
        ]);

        $id = session('MEMBER_ID');
        $var = MemberDetail::where('memberid', $id)->first();
        $var->name = $request->post('name');
        $var->mobile = $request->post('mobile');
        // $var->dob = $request->post('dob');
        // $var->gender = $request->post('gender');
        $var->email = $request->post('email');
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                session()->flash('failedMsg', 'Allowed image type is jpg, jpeg, png. Please change image type');

                return redirect()->back();
            }
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $var->profile_image = $filename;
        }
        $var->profile_status = 'Updated';
        $var->save();

        session()->flash('successMsg', 'Profile Details have been updated');

        return redirect()->back();
    }

    public function profile(Request $request)
    {
        $id = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $id)->first();

        return view('member.profile.profile')->with($result);
    }

    public function createUser()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        return view('member.profile.create-user')->with($result);
    }

    public function password()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        return view('member.profile.security')->with($result);
    }

    public function geneology()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['directs'] = MemberDetail::where('sponsorid', $memberid)->get();

        return view('member.team.geneology')->with($result);
    }

    public function ViewGeneology($id)
    {
        $data = MemberDetail::where('id', $id)->orWhere('memberid', $id)->first();

        if (! $data) {
            return redirect('member/team/geneology');
        }

        $result['data'] = $data;
        $result['directs'] = MemberDetail::where('sponsorid', $data->memberid)->get();

        return view('member.team.view-geneology')->with($result);
    }

    public function directteam()
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $result['directData'] = MemberDetail::where('sponsorid', $result['data']['memberid'])->get();

        return view('member.team.direct-team')->with($result);
    }

    public function leveldetails(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();

        return view('member.team.level-directs')->with($result);
    }

    public function lelMemDetails($level)
    {
        $uplines = 'upline_' . $level;
        $memberid = session('MEMBER_ID');
        $result['data'] = MemberDetail::where('memberid', $memberid)->first();
        $ids = UplineMember::where($uplines, $memberid)->pluck('memberid');
        $result['users'] = MemberDetail::whereIn('memberid', $ids)->get();
        $result['levelNo'] = $level;

        return view('member.team.level-members-details')->with($result);
    }

    public function getMember(Request $request)
    {
        $memberid = $request->post('memberid');
        if ($memberid != '') {
            $data = MemberDetail::where('memberid', $memberid)->first();
            if ($data) {
                return response()->json([
                    'code' => 1,
                    'data' => '<span class="text-success">Member Name :' . $data['name'] . '</span>',
                    'name' => '<span >' . $data['name'] . ' wants to lend</span>',
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>',
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'data' => '',
            ]);
        }
    }

    public function getSponname(Request $request)
    {
        $sponsorid = $request->post('sponsorid');
        if ($sponsorid != '') {
            $data = MemberDetail::where('memberid', $sponsorid)->first();
            if ($data) {
                // <span class="text-danger">This Sponsor Id is not active. Please change sponsor id</span>
                if ($data['status'] == 'Temp') {
                    return response()->json([
                        'code' => 0,
                        'data' => '<span class="text-success">Sponsor Name :' . $data['name'] . '</span>',
                    ]);
                } elseif ($data['status'] == 'Deactive') {
                    return response()->json([
                        'code' => 0,
                        'data' => '<span class="text-danger">This Sponsor Id is Deactive. Please change sponsor id</span>',
                    ]);
                } elseif ($data['status'] == 'Active') {
                    return response()->json([
                        'code' => 1,
                        'data' => '<span class="text-success">Sponsor Name :' . $data['name'] . '</span>',
                    ]);
                }
            } else {
                return response()->json([
                    'code' => 1,
                    'data' => '<span class="text-danger">No Data Found with this Id</span>',
                ]);
            }
        } else {
            return response()->json([
                'code' => 1,
                'data' => '',
            ]);
        }
    }

    public function sendRegisterOtp(Request $request)
    {
        $email = $request->post('email');

        if (! $email || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'code' => 0,
                'data' => '<span class="text-danger">Please enter a valid email address</span>',
            ]);
        }

        try {
            // Check if email already exists
            $existingUser = MemberDetail::where('email', $email)->first();
            if ($existingUser) {
                return response()->json([
                    'code' => 0,
                    'data' => '<span class="text-danger">This email is already registered. Please use a different email address.</span>',
                ]);
            }

            $otp = rand(100000, 999999);
            $request->session()->put('register_otp', $otp);
            $request->session()->put('register_email', $email);
            $request->session()->put('register_otp_time', time());

            $mailData = [
                'otp' => $otp,
            ];
            $user['to'] = $email;
            // Mail::send('member.mails.register-otp', $mailData, function ($message) use ($user) {
            //     $message->to($user['to']);
            //     $message->subject('Verify Your Email - '.config('detailsApp.name'));
            // });

            return response()->json([
                'code' => 1,
                'data' => '<span class="text-success">OTP has been sent to your email. Please check your inbox.</span>',
                'message' => 'OTP sent successfully',
                'otp' => $otp,
            ]);
        } catch (GlobalThrowable $e) {
            Log::error('sendRegisterOtp failed', [
                'email' => $email,
                'error' => $e->getMessage(),
            ]);

            $errorText = app()->environment('local')
                ? 'Server error: ' . e($e->getMessage())
                : 'Failed to send OTP. Please try again.';

            return response()->json([
                'code' => 0,
                'data' => '<span class="text-danger">' . $errorText . '</span>',
            ]);
        }
    }

    public function verifyRegisterOtp(Request $request)
    {
        $enteredOtp = $request->post('otp');
        $sessionOtp = session()->get('register_otp');
        $sessionEmail = session()->get('register_email');
        $otpTime = session()->get('register_otp_time');

        if (! $sessionOtp || ! $sessionEmail || ! $otpTime) {
            return response()->json([
                'code' => 0,
                'data' => '<span class="text-danger">OTP session expired. Please request a new OTP.</span>',
            ]);
        }

        // Check if OTP is expired (10 minutes)
        if (time() - $otpTime > 600) {
            session()->forget(['register_otp', 'register_email', 'register_otp_time']);

            return response()->json([
                'code' => 0,
                'data' => '<span class="text-danger">OTP has expired. Please request a new OTP.</span>',
            ]);
        }

        if ($enteredOtp == $sessionOtp) {
            // Mark email as verified
            session()->put('email_verified', true);
            session()->put('verified_email', $sessionEmail);

            return response()->json([
                'code' => 1,
                'data' => '<span class="text-success">Email verified successfully! You can now complete your registration.</span>',
                'message' => 'Email verified successfully',
            ]);
        } else {
            return response()->json([
                'code' => 0,
                'data' => '<span class="text-danger">Invalid OTP. Please try again.</span>',
            ]);
        }
    }

    /**
     * Display Promotional Banners gallery page (Static Banners).
     */
    public function promotionalBanners(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $member = MemberDetail::where('memberid', $memberid)->first();
        $data = $member;

        // Static banners list (b1.jpeg to b10.jpeg)
        $banners = [
            [
                'id' => 1,
                'filename' => 'b1.jpeg',
                'title' => 'Official Promo Banner #1',
                'tag' => 'Math Wallet Ecosystem',
            ],
            [
                'id' => 2,
                'filename' => 'b2.jpeg',
                'title' => 'Official Promo Banner #2',
                'tag' => 'Staking & High Yield',
            ],
            [
                'id' => 3,
                'filename' => 'b3.jpeg',
                'title' => 'Official Promo Banner #3',
                'tag' => 'Global Community',
            ],
            [
                'id' => 4,
                'filename' => 'b4.jpeg',
                'title' => 'Official Promo Banner #4',
                'tag' => 'Partnership Program',
            ],
            [
                'id' => 5,
                'filename' => 'b5.jpeg',
                'title' => 'Official Promo Banner #5',
                'tag' => 'Crypto Growth',
            ],
            [
                'id' => 6,
                'filename' => 'b6.jpeg',
                'title' => 'Official Promo Banner #6',
                'tag' => 'Secure Blockchain',
            ],
            [
                'id' => 7,
                'filename' => 'b7.jpeg',
                'title' => 'Official Promo Banner #7',
                'tag' => 'Referral Commission',
            ],
            [
                'id' => 8,
                'filename' => 'b8.jpeg',
                'title' => 'Official Promo Banner #8',
                'tag' => 'Passive Income',
            ],
            [
                'id' => 9,
                'filename' => 'b9.jpeg',
                'title' => 'Official Promo Banner #9',
                'tag' => 'Network Expansion',
            ],
            [
                'id' => 10,
                'filename' => 'b10.jpeg',
                'title' => 'Official Promo Banner #10',
                'tag' => 'Token Rewards',
            ],
        ];

        $baseUrl = $request->getSchemeAndHttpHost();

        foreach ($banners as &$banner) {
            $banner['url'] = $baseUrl . '/uassets/mw_banners/' . $banner['filename'];
            $banner['download_url'] = route('member.promotional-banners.download', ['filename' => $banner['filename']]);
        }
        unset($banner);

        $referralLink = $baseUrl . '/member/register/' . ($member->memberid ?? '');

        return view('member.promotional-banners', compact('data', 'member', 'banners', 'referralLink'));
    }

    /**
     * Download Promotional Banner image with attachment headers.
     */
    public function downloadBanner(string $filename)
    {
        $cleanFilename = basename($filename);
        $allowedFiles = ['b1.jpeg', 'b2.jpeg', 'b3.jpeg', 'b4.jpeg', 'b5.jpeg', 'b6.jpeg', 'b7.jpeg', 'b8.jpeg', 'b9.jpeg', 'b10.jpeg'];

        if (! in_array($cleanFilename, $allowedFiles, true)) {
            abort(404, 'Banner image not found.');
        }

        $filePath = public_path('uassets/mw_banners/' . $cleanFilename);

        if (! file_exists($filePath)) {
            abort(404, 'Banner image not found.');
        }

        return response()->download($filePath, $cleanFilename);
    }

    /**
     * Display Business Plan PDF presentation page (Static Multilingual PDFs).
     */
    public function businessPlanPdf(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $member = MemberDetail::where('memberid', $memberid)->first();
        $data = $member;

        // Static Multilingual PDFs list from public/uassets/mw_pdf
        $pdfs = [
            [
                'id' => 1,
                'filename' => 'Math Wallet English.pdf',
                'language' => 'English',
                'native_language' => 'English',
                'flag' => '🇬🇧',
                'flag_code' => 'gb',
                'badge' => 'Global Edition',
                'badge_color' => '#3b82f6',
                'gradient' => 'linear-gradient(135deg, rgba(59, 130, 246, 0.2) 0%, rgba(37, 99, 235, 0.05) 100%)',
                'border_color' => 'rgba(59, 130, 246, 0.3)',
                'icon_color' => '#60a5fa',
                'title' => 'Math Wallet Global Business Plan',
                'description' => 'Complete international presentation detailing the Math Wallet ecosystem, daily ROI returns, staking plans, partnership investments, and multi-level income structure.',
                'size' => '5.80 MB',
                'pages_hint' => 'Full Pitch Deck',
            ],
            [
                'id' => 2,
                'filename' => 'Math Wallet Chinese.pdf',
                'language' => 'Chinese',
                'native_language' => '中文 (简体)',
                'flag' => '🇨🇳',
                'flag_code' => 'cn',
                'badge' => '亚洲官方版 (Asia)',
                'badge_color' => '#ef4444',
                'gradient' => 'linear-gradient(135deg, rgba(239, 68, 68, 0.2) 0%, rgba(220, 38, 38, 0.05) 100%)',
                'border_color' => 'rgba(239, 68, 68, 0.3)',
                'icon_color' => '#f87171',
                'title' => 'Math Wallet 中文商业计划书',
                'description' => '专为华语与亚洲市场打造的完整商业计划书，涵盖账户激活、质押投资、每日ROI收益、团队多级分红与提现体系。',
                'size' => '5.96 MB',
                'pages_hint' => '中文完整版',
            ],
            [
                'id' => 3,
                'filename' => 'Math Wallet Russian.pdf',
                'language' => 'Russian',
                'native_language' => 'Русский',
                'flag' => '🇷🇺',
                'flag_code' => 'ru',
                'badge' => 'СНГ / CIS Edition',
                'badge_color' => '#10b981',
                'gradient' => 'linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.05) 100%)',
                'border_color' => 'rgba(16, 185, 129, 0.3)',
                'icon_color' => '#34d399',
                'title' => 'Math Wallet Презентация на Русском',
                'description' => 'Официальный бизнес-план экосистемы Math Wallet для русскоязычного сообщества: программы стейкинга, партнерские инвестиции, ежедневный ROI доход и реферальные вознаграждения.',
                'size' => '5.62 MB',
                'pages_hint' => 'Полная презентация',
            ],
        ];

        $baseUrl = $request->getSchemeAndHttpHost();

        foreach ($pdfs as &$pdf) {
            $pdf['url'] = $baseUrl . '/uassets/mw_pdf/' . rawurlencode($pdf['filename']);
            $pdf['download_url'] = route('member.business-plan-pdf.download', ['filename' => $pdf['filename']]);
        }
        unset($pdf);

        $referralLink = $baseUrl . '/member/register/' . ($member->memberid ?? '');

        return view('member.business-plan-pdf', compact('data', 'member', 'pdfs', 'referralLink'));
    }

    /**
     * Download Business Plan PDF file with attachment headers.
     */
    public function downloadPdf(string $filename)
    {
        $cleanFilename = basename($filename);
        $allowedFiles = ['Math Wallet English.pdf', 'Math Wallet Chinese.pdf', 'Math Wallet Russian.pdf'];

        if (! in_array($cleanFilename, $allowedFiles, true)) {
            abort(404, 'Business plan PDF not found.');
        }

        $filePath = public_path('uassets/mw_pdf/' . $cleanFilename);

        if (! file_exists($filePath)) {
            abort(404, 'Business plan PDF not found.');
        }

        return response()->download($filePath, $cleanFilename);
    }

    /**
     * Display Plan Video presentation page (Static Video).
     */
    public function planVideo(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $member = MemberDetail::where('memberid', $memberid)->first();
        $data = $member;

        $baseUrl = $request->getSchemeAndHttpHost();

        // Static Plan Video details from public/uassets/mw_plan_video
        $video = [
            'filename' => '1.mp4',
            'title' => 'Math Wallet Official Business Plan Presentation',
            'tag' => 'Official Presentation',
            'duration' => 'Full Video',
            'size' => '1.69 MB',
            'format' => 'MP4 Video',
            'url' => $baseUrl . '/uassets/mw_plan_video/1.mp4',
            'download_url' => route('member.plan-video.download', ['filename' => '1.mp4']),
            'description' => 'Watch the complete official video presentation explaining the Math Wallet ecosystem.',
        ];

        $referralLink = $baseUrl . '/member/register/' . ($member->memberid ?? '');

        return view('member.plan-video', compact('data', 'member', 'video', 'referralLink'));
    }

    /**
     * Download Plan Video file with attachment headers.
     */
    public function downloadVideo(string $filename)
    {
        $cleanFilename = basename($filename);
        $allowedFiles = ['1.mp4'];

        if (! in_array($cleanFilename, $allowedFiles, true)) {
            abort(404, 'Plan video not found.');
        }

        $filePath = public_path('uassets/mw_plan_video/' . $cleanFilename);

        if (! file_exists($filePath)) {
            abort(404, 'Plan video not found.');
        }

        return response()->download($filePath, 'Math_Wallet_Business_Plan.mp4');
    }

    /**
     * Display Tutorial Video page (Static Video).
     */
    public function tutorialVideo(Request $request)
    {
        $memberid = session('MEMBER_ID');
        $member = MemberDetail::where('memberid', $memberid)->first();
        $data = $member;

        $baseUrl = $request->getSchemeAndHttpHost();

        // Static Tutorial Video details from public/uassets/mw_Tutorial_video
        $video = [
            'filename' => '1.mp4',
            'title' => 'Math Wallet Official System Tutorial & Guide',
            'tag' => 'Official Tutorial',
            'duration' => 'Step-by-Step Guide',
            'size' => '1.69 MB',
            'format' => 'MP4 Video',
            'url' => $baseUrl . '/uassets/mw_Tutorial_video/1.mp4',
            'download_url' => route('member.tutorial-video.download', ['filename' => '1.mp4']),
            'description' => 'Learn how to use Math Wallet step-by-step: account activation, staking, fund deposits, tracking daily ROI & level incomes, and wallet withdrawals.',
        ];

        $referralLink = $baseUrl . '/member/register/' . ($member->memberid ?? '');

        return view('member.tutorial-video', compact('data', 'member', 'video', 'referralLink'));
    }

    /**
     * Download Tutorial Video file with attachment headers.
     */
    public function downloadTutorialVideo(string $filename)
    {
        $cleanFilename = basename($filename);
        $allowedFiles = ['1.mp4'];

        if (! in_array($cleanFilename, $allowedFiles, true)) {
            abort(404, 'Tutorial video not found.');
        }

        $filePath = public_path('uassets/mw_Tutorial_video/' . $cleanFilename);

        if (! file_exists($filePath)) {
            abort(404, 'Tutorial video not found.');
        }

        return response()->download($filePath, 'Math_Wallet_Tutorial_Guide.mp4');
    }
    
    public function singlrLegDetails()
    {
        $memberid = session('MEMBER_ID');

        $data = MemberDetail::where('memberid', $memberid)->first();

        if (! $data || empty($data->activated_at)) {

            $totalMembers = 0;
            $membersDetails = collect();
        } else {

            $activated_at = $data->activated_at;

            $query = MemberDetail::where('activated_at', '>=', $activated_at)
                ->where('id', '!=', $data->id)
                ->where('memberid', '!=', $memberid)
                ->orWhereNull('activated_at');

            // Total members — Any status 
            $totalMembers = $query->count();

            // Details — Active first, then Temp, then Blocked
            $membersDetails = $query
                ->orderByRaw("
                CASE
                    WHEN status = 'Active' THEN 1
                    WHEN status = 'Temp' THEN 2
                    WHEN status = 'Blocked' THEN 3
                    ELSE 4
                END
            ")
                ->orderBy('activated_at', 'asc')
                ->get();

            // Total members — status Active
            $totalActiveMembers = $query->where('status', 'Active')->count();
        }

        return view(
            'member.single-leg-details',
            compact('data', 'totalMembers', 'membersDetails', 'totalActiveMembers')
        );
    }

    /**
     * Download Business Plan Text file with attachment headers.
     */
    public function businessPlanText()
    {
        return view('member.business-plan-text');
    }
}
