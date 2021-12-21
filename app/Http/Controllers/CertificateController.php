<?php

namespace App\Http\Controllers;

use App\Models\certificate;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetails()
    {
        //not_before not_after $allCer['expiryCount'] = certificate::where('')->get();
        $CerDetail['aboutNow'] = (date('Y-m-d', strtotime(date('Y-m-d') . " +10 days")));
        $CerDetail['lastWeek'] = (date('Y-m-d', strtotime(date('Y-m-d') . " -7 days")));
        $CerDetail['now'] = date('Y-m-d');
        $CerDetail['recentlyUsed']= count(certificate::whereRaw('CAST(certificates.not_before AS DATE) between ? and ?', [$CerDetail['lastWeek'], $CerDetail['now']])->get());
        $CerDetail['expireCert']= count(certificate::whereRaw('CAST(certificates.not_after AS DATE) between ? and ?', [$CerDetail['now'],$CerDetail['aboutNow']])->get());
        $CerDetail['allCert']= count(certificate::all());
        return response()->json($CerDetail);
    }
    public function store(Request $request)
    {
        
    }
    public function getData(Request $request)
    {
        $allCer=certificate::all();
        return response()->json($allCer);
    }

}
