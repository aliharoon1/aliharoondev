<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ContactUs;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Fact;
use App\Models\Portfolio;
use App\Models\PortfolioDetail;
use App\Models\Section;
use App\Models\Service;
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function landing()
    {

        $sections = Section::select('id','title','detail','slug')->get();
        $skills = Skill::select('id','title','percentage')->get();
        $sociallinks = SocialLink::select('id','title','icon','link')->get();
        $user = User::select('id','title','image','summary','email','address','phone','name')->where('id',1)->first();
        $contact = ContactUs::select('id','address','email','phone','location')->get();
        $services = Service::select('id', 'title','detail','icon')->get();
        $about = About::select('id', 'title','short_description','birth_date','website_url','degree','phone','email','address','detail','freelance','image')->get();
        $facts = Fact::select('id', 'title','detail','icon','number')->get();
        $portfolios = Portfolio::select('id', 'title','detail','category','image')->get();
        $educations = Education::select('id','detail','title','degree','institute','batch')->get();
        $experiences = Experience::select('id','title','start_date','end_date','company_name','company_address','work_type','job_type','detail')->get();
        $testimonials = Testimonial::select('id','name','title','image','testimonial_text')->get();
        return view('frontend.content.pages.index',  compact('sections','skills','educations','portfolios','facts','about','services','experiences','contact','testimonials','user','sociallinks'));
    }

    public function portfolio_detail($id)
    {
        $portfolioDetail = PortfolioDetail::where('portfolio_id',$id)->first();
        return view('frontend.content.pages.portfolio-details',compact('portfolioDetail'));
    }
}
