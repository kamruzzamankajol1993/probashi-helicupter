<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobtitle;
use App\Models\Jobdepartment;
use App\Models\Jobcategory;
use App\Models\PartnerWithUs;
use App\Models\JobSeeker;
use App\Models\Sixthrow;
use App\Models\Whyjoinus;
use App\Models\Mission;
use App\Models\Slider;
use App\Models\Tenthrow;
use App\Models\UrgentVacancy;
use App\Models\Employeereview;
use App\Models\Order;
use Session;
use Auth;
class FrontController extends Controller
{

    public function job_details(){

        return view('front.job_details');

    }
    public function index(){


        $videoreviewList = Employeereview::where('status','Active')->get();

        $clientSayDetail = UrgentVacancy::where('status','Active')->get();


        $salaryList = Slider::all();
        $galleryList = Tenthrow::all();



        $missionLists = Mission::all();


        $allOffers = Whyjoinus::all();
        $headline_list = Jobtitle::get();
        $headline_list2 = Jobdepartment::get();
        $headline_list1 = Jobcategory::get();
        $allNewsList = Sixthrow::all();
        return view('front.index',compact('videoreviewList','clientSayDetail','galleryList','salaryList','missionLists','allOffers','allNewsList','headline_list','headline_list1','headline_list2'));
    }


    public function get_dp_name_from_cat(Request $request){

        $get_dp = Jobdepartment::where('cat_id',$request->cat_name)->get();

     $data = view('front.get_dp_name_from_cat',compact('get_dp'))->render();
     return response()->json($data);
 }


 public function get_title_name_from_dp(Request $request){

    $get_dp = Jobtitle::where('dp_id',$request->cat_name)->get();

 $data = view('front.get_title_name_from_dp',compact('get_dp'))->render();
 return response()->json($data);
}


public function how_it_work(){

    $allNewsList = Sixthrow::all();
    return view('front.how_it_work',compact('allNewsList'));

}


public function mission(){


    return view('front.mission');

}


public function vision(){


    return view('front.vision');

}


public function values(){


    return view('front.values');

}


public function our_accreditations(){

    $missionLists = Mission::all();

    return view('front.our_accreditations',compact('missionLists'));

}

public function service_detail($slug){

    $missionLists = Mission::where('slug',$slug)->first();

         // get the current user
         $user = Mission::find($missionLists->id);

         // get previous user id
         $previous = Mission::where('id', '<', $user->id)->max('id');


         $pnews=Mission::Where('id','=',$previous)->first();

         // get next user id
         $next = Mission::where('id', '>', $user->id)->min('id');
         $nnews=Mission::Where('id','=',$next)->first();


         $latestId= Mission::orderBy('id','desc')->limit(1)->value('id');
         $firstId=Mission::orderBy('id','asc')->limit(1)->value('id');

    return view('front.service_detail',compact('firstId','latestId','nnews','next','pnews','previous','missionLists','user'));
}


public function our_experties(){

     $allOffers = Whyjoinus::all();
    return view('front.our_experties',compact('allOffers'));

}

public function our_services($slug){

    $allOffers = Whyjoinus::where('slug',$slug)->first();
return view('front.our_services',compact('allOffers'));
}


public function post_a_job($slug){
    $allOffers=Mission::where('slug',$slug)->first();
    return view('front.post_a_job',compact('allOffers'));
    }

    public function final_confirm (Request $request){

        //dd($request->all());

        if($request->payment_type == 'Cash'){



            $newData = new Order();
            $newData->name = $request->name;
            $newData->order_type = $request->order_type;
            $newData->price = $request->price;
            $newData->phone = $request->phone;
            $newData->address = $request->address;
            $newData->payment_type = $request->payment_type;
            $newData->user_id = Auth::user()->id;





            $newData->status = 'Pending';
            $newData->order_id = $request->id;
            $newData->payment_id = "PHSB- ".rand(1111111,9999999);
            $newData->save();

            return view('front.success');

        }else{


            Session::put('user_id',Auth::user()->id);
            Session::put('id', $request->id);
            Session::put('order_type', $request->order_type);
            Session::put('price', $request->price);
            Session::put('name', $request->name);
            Session::put('phone', $request->phone);
            Session::put('address', $request->address);
            Session::put('payment_type', $request->payment_type);


            return redirect()->route('payment');


        }
    }


    public function payment(){

        $tran_id = "PHSB- ".rand(1111111,9999999);//unique transection id for every transection

        $currency= "BDT"; //aamarPay support Two type of currency USD & BDT

        $amount = Session::get('price');   //10 taka is the minimum amount for show card option in aamarPay payment gateway

        //For live Store Id & Signature Key please mail to support@aamarpay.com
        $store_id = "aamarpaytest";

        $signature_key = "dbb74894e82415a2f7ff0ec3a97e4183";

        $url = "https://​sandbox​.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"


            $newData = new Order();
            $newData->name = Session::get('name');
            $newData->order_type = Session::get('order_type');
            $newData->price = Session::get('price');
            $newData->phone = Session::get('phone');
            $newData->address = Session::get('address');
            $newData->user_id = Session::get('user_id');
          //   $newData->payment_type = $arrData->payment_type;
          //   $newData->status = $arrData->pay_status;
            $newData->order_id=Session::get('id');
            $newData->payment_id =$tran_id;
            $newData->save();


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "store_id": "'.$store_id.'",
            "tran_id": "'.$tran_id.'",
            "success_url": "'.route('success').'",
            "fail_url": "'.route('fail').'",
            "cancel_url": "'.route('cancel').'",
            "amount": "'.$amount.'",
            "currency": "'.$currency.'",
            "signature_key": "'.$signature_key.'",
            "desc": "Merchant Registration Payment",
            "cus_name": "'.Session::get('name').'",
            "cus_email": "name@merchantcusomter.com",
            "cus_add1": "'.Session::get('address').'",
            "cus_add2": "'.Session::get('order_type').'",
            "cus_city": "'.Session::get('id').'",
            "cus_state": "Dhaka",
            "cus_postcode": "1206",
            "cus_country": "Bangladesh",
            "cus_phone": "'.Session::get('phone').'",
            "type": "json"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // dd($response);

        $responseObj = json_decode($response);

        if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {

            $paymentUrl = $responseObj->payment_url;
            // dd($paymentUrl);
            return redirect()->away($paymentUrl);

        }else{
            echo $response;
        }



    }

    public function success(Request $request){

        $request_id= $request->mer_txnid;

        Order::where('payment_id', $request_id)
       ->update([
           'payment_type' => $request->payment_type,
           'status' => $request->pay_status
        ]);

        //verify the transection using Search Transection API

        $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json";

        //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"




        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);


        $arrData = json_decode($response);

        //new code start
//dd($arrData);
        //   $newData = new Order();
        //   $newData->name = $arrData->cus_name;
        //   $newData->order_type = $arrData->cus_add2;
        //   $newData->user_id = Session::get('user_id');
        //   $newData->price = $arrData->amount;
        //   $newData->phone = $arrData->cus_phone;
        //   $newData->address = $arrData->cus_add1;
        //   $newData->payment_type = $arrData->payment_type;
        //   $newData->status = $arrData->pay_status;
        //   $newData->order_id=$arrData->cus_city;
        //   $newData->payment_id =$arrData->mer_txnid;
        //   $newData->save();
        //new code end


        //echo $response;


        return view('front.success');

    }

    public function fail(Request $request){
        //return $request;

        return view('front.fail');
    }

    public function cancel(){
        return redirect()->back();
    }



    public function sendMessageFromPartner(Request $request){


        $save = new PartnerWithUs;
        $save->name = $request->name;
        $save->company_name	 = $request->companyName;
        $save->state = $request->state;
        $save->country = $request->country;
        $save->email = $request->email;
        $save->phone = $request->phoneNumber;
        $save->des = $request->des;
        $save->status = 'Pending';
        $save->save();

        return $data = 1;


    }

    public function jobSeekerPartOnePost(Request $request){
        //JobSeeker
        //dd($request->all());

        if(empty($request->family_members_country)){
            $arr_all = 'null';
        }else{
        $arr_all = implode(",",$request->family_members_country);
        }

        $save = new JobSeeker;
        $save->your_self = $request->your_self;
        $save->seaman_book_or_bd_cdc	 = $request->seaman_book_or_bd_cdc;
        $save->seaman_book_or_bd_cdc_detail = $request->seaman_book_or_bd_cdc_detail;
        $save->password_valid_till_one_year = $request->password_valid_till_one_year;
        $save->full_vaccinated_for_covid = $request->full_vaccinated_for_covid;
        $save->placement_onboard_considered = $request->placement_onboard_considered;
        $save->ielts_score = $request->ielts_score;
        $save->ielts_score_des = $request->ielts_score_des;
        $save->work_experience = $request->work_experience;
        $save->work_experience_des = $request->work_experience_des;
        $save->settled_country = $request->settled_country;
        $save->interested_to_work_on_ship = $request->interested_to_work_on_ship;
        $save->relative_work_on_ship = $request->relative_work_on_ship;
        $save->relative_work_on_ship_des = $request->relative_work_on_ship_des;


        $save->pay_isol_or_other = $request->pay_isol_or_other;
        $save->pay_third_party = $request->pay_third_party;
        $save->fill_up_by_assists = $request->fill_up_by_assists;
        $save->family_members_country = $arr_all;
        $save->assists_and_family_des = $request->assists_and_family_des;
        $save->expected_salary = $request->expected_salary;
        $save->hear_about_us = $request->hear_about_us;
        $save->married_or_not = $request->married_or_not;
        $save->qualification = $request->qualification;
        $save->hospitali_course = $request->hospitali_course;
        $save->sea_motion_work = $request->sea_motion_work;
        $save->get_us_visa = $request->get_us_visa;
        $save->visa_cancelled_or_not = $request->visa_cancelled_or_not;

        $save->refused_us_visa = $request->refused_us_visa;


        $save->travel_country = $request->travel_country;
        $save->terrorist_organization_member = $request->terrorist_organization_member;
        $save->police_clearance_certificate = $request->police_clearance_certificate;
        $save->illegal_activity = $request->illegal_activity;
        $save->status = 'Pending';

        $save->arrested = $request->arrested;
        $save->mental_or_physical_disorder = $request->mental_or_physical_disorder;
        $save->disease = $request->disease;
        $save->insurgent_organization = $request->insurgent_organization;
        $save->served_military = $request->served_military;
        $save->charitable_organization = $request->charitable_organization;
        $save->save();

        $mainId = $save->id;


        return redirect()->route('jobSeekerPartTwo',base64_encode($mainId))->with('success','Created successfully!');

    }



    public function jobSeekerPartOnePostEdit(Request $request){
        if(empty($request->family_members_country)){
            $arr_all = 'null';
        }else{
        $arr_all = implode(",",$request->family_members_country);
        }

        $save = JobSeeker::find($request->id);
        $save->your_self = $request->your_self;
        $save->seaman_book_or_bd_cdc	 = $request->seaman_book_or_bd_cdc;
        $save->seaman_book_or_bd_cdc_detail = $request->seaman_book_or_bd_cdc_detail;
        $save->password_valid_till_one_year = $request->password_valid_till_one_year;
        $save->full_vaccinated_for_covid = $request->full_vaccinated_for_covid;
        $save->placement_onboard_considered = $request->placement_onboard_considered;
        $save->ielts_score = $request->ielts_score;
        $save->ielts_score_des = $request->ielts_score_des;
        $save->work_experience = $request->work_experience;
        $save->work_experience_des = $request->work_experience_des;
        $save->settled_country = $request->settled_country;
        $save->interested_to_work_on_ship = $request->interested_to_work_on_ship;
        $save->relative_work_on_ship = $request->relative_work_on_ship;
        $save->relative_work_on_ship_des = $request->relative_work_on_ship_des;


        $save->pay_isol_or_other = $request->pay_isol_or_other;
        $save->pay_third_party = $request->pay_third_party;
        $save->fill_up_by_assists = $request->fill_up_by_assists;
        $save->family_members_country = $arr_all;
        $save->assists_and_family_des = $request->assists_and_family_des;
        $save->expected_salary = $request->expected_salary;
        $save->hear_about_us = $request->hear_about_us;
        $save->married_or_not = $request->married_or_not;
        $save->qualification = $request->qualification;
        $save->hospitali_course = $request->hospitali_course;
        $save->sea_motion_work = $request->sea_motion_work;
        $save->get_us_visa = $request->get_us_visa;
        $save->visa_cancelled_or_not = $request->visa_cancelled_or_not;

        $save->refused_us_visa = $request->refused_us_visa;


        $save->travel_country = $request->travel_country;
        $save->terrorist_organization_member = $request->terrorist_organization_member;
        $save->police_clearance_certificate = $request->police_clearance_certificate;
        $save->illegal_activity = $request->illegal_activity;

        $save->arrested = $request->arrested;
        $save->mental_or_physical_disorder = $request->mental_or_physical_disorder;
        $save->disease = $request->disease;
        $save->insurgent_organization = $request->insurgent_organization;
        $save->served_military = $request->served_military;
        $save->charitable_organization = $request->charitable_organization;
        $save->save();

        $mainId = $save->id;


        return redirect()->route('jobSeekerPartTwo',base64_encode($mainId))->with('success','Created successfully!');

    }


    public function jobSeekerPartTwo($id){

        $enCode = $id;
        $decode = base64_decode($enCode);
        return view('front.cv_login_main',compact('enCode','decode'));

    }


    public function jobSeekerPartOne($id){

       $jobSeekerList = JobSeeker::where('id',base64_decode($id))->first();
       return view('front.jobSeekerPartOne',compact('jobSeekerList'));
    }

    public function jobSeekerPartTwoPost(Request $request){


        //dd($request->all());


        $save = JobSeeker::find($request->id);
        $save->first_name = $request->first_name;
        $save->last_name	 = $request->last_name;
        $save->email_address = $request->email_address;
        $save->phone = $request->phone;
        $save->personal_summary = $request->personal_summary;
        $save->team = $request->team;
        $save->ritz_carlton_brand_work = $request->ritz_carlton_brand_work;
        $save->valid_schengen_visa = $request->valid_schengen_visa;
        $save->gender = $request->gender;
        $save->gender_identity = $request->gender_identity;
        $save->nationality = $request->nationality;
        $save->martial_status = $request->martial_status;
        $save->age_bracket = $request->age_bracket;
        $save->disability = $request->disability;
        $save->veteran_status = $request->veteran_status;
        $save->preferred_pronouns = $request->preferred_pronouns;

        if ($request->hasfile('cv')) {
            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('public/uploads/', $filename);
            $save->cv = 'uploads/' . $filename;
        }
        $save->save();
        return redirect()->route('cv_login_form')->with('success','submit successfully!');
    }


public function crew_cv_searching(){
        return view('front.crew_cv_searching');
        }

    public function top_notch(){
            return view('front.top_notch');
            }
            public function hierarchy(){
                return view('front.hierarchy');
                }
                public function crew_login(){
                    return view('front.crew_login');
                    }
                    public function help24_7(){
                        return view('front.help24_7');
                        }
                        public function urgent_vacancy(){
                            return view('front.urgent_vacancy');
                            }

                            public function hiring_process(){
                                return view('front.hiring_process');
                                }
                                public function career_navigation(){
                                    return view('front.career_navigation');
                                    }


                                    public function cruiseship(){
                                        return view('front.cruiseship');
                                        }

                    public function megayacht(){
                                            return view('front.megayacht');
                                            }


                            public function river_cruise(){
                                                return view('front.river_cruise');
                                                }


                        public function private_jets(){
                                                    return view('front.private_jets');
                                                    }


                            public function hotel_ressort(){
                                                        return view('front.hotel_ressort');
                                                        }



                            public function merchant_navy(){
                                                            return view('front.merchant_navy');
                                                            }


                                public function offshore(){
                                                                return view('front.offshore');
                                                                }


                                public function world_butler(){
                                                                    return view('front.world_butler');
                                                                    }



                                                                    public function event(){
                                                                        return view('front.event');
                                                                        }




                                                                        public function blog(){
                                                                            return view('front.blog');
                                                                            }


                                                                            public function faq(){
                                                                                return view('front.faq');
                                                                                }


}
