<?php

namespace App\Http\Controllers;

use App\WorkAndNews;
use App\WorkDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Zttp\Zttp;
use Youtube;

class HomeController extends Controller
{
    public function index()
    {
        //     $videoList = Youtube::listChannelVideos('UCiKKfNsouipzLpPEUdr9__Q', 40);
        //    return response()->json($videoList);
        return view('frontend.index');
    }

    public function works()
    {
        $works = WorkAndNews::works()->orderBy('sort_order', 'asc')->get();
        return view('frontend.works', compact('works'));
    }

    public function workDetail($seoUrl)
    {
        $work = WorkAndNews::where('seo_url', $seoUrl)->with('details')->first();
        return view('frontend.workDetail', compact('work'));
    }

    public function news($show='*')
    {   
        $data = [];
        if($show == 'news'){
            $data = WorkAndNews::news()->orderBy('sort_order', 'asc')->get()->toArray();
        }if($show == 'instagram'){
            $data = $this->getInstagramFeed();
        }
        if($show == 'twitter'){
            $data = $this->getTwitterFeed();
        }
        if($show == '*'){
            $news = WorkAndNews::news()->orderBy('sort_order', 'asc')->get()->toArray();
            $data = array_merge($this->getTwitterFeed(), array_merge($news,$this->getInstagramFeed()));
        }
    
        $news =  collect($data)->map(function ($item) {
            return (object) $item;
        })->sortBy('title');

        return view('frontend.news', compact('news'));
    }

    public function newsDetail($seoUrl)
    {
        $news = WorkAndNews::where('seo_url', 'news.'.$seoUrl)->first();
        $newsAll = WorkAndNews::news()->where('seo_url', '!=', 'news.'.$seoUrl)->orderBy('sort_order', 'asc')->get();
        return view('frontend.newsDetail', compact('news', 'newsAll'));
    }

    public function contact()
    {
        $countries = ['Pakistan', 'Uman','New York'];
        $weatherData = [];
        foreach ($countries as $key => $value) {
            $response = Zttp::get("https://api.openweathermap.org/data/2.5/weather?appid=67b0cdfcb8c44196fcd7e035f3a6aee6&q=$value");
            
            $weatherData[] = [
                'temp' => round($response->json()['main']['temp'] - 273.15),
                'icon' => preg_replace('/[^0-9]/','',  $response->json()['weather'][0]['icon']),
                'name' => $response->json()['name']
            ];
        }
        return view('frontend.contact', compact('weatherData'));
    }



    private function getInstagramFeed()
    {
        // userid of serial kolor is 726829223;

        $token = '726829223.2a46ab3.510ed00e43d54dad981abbb19bc8304b';
        
        $response =  Zttp::get("https://api.instagram.com/v1/users/self/media/recent/?access_token=$token");
        $data = [];
        foreach ($response->json()['data'] as $value) {
            $data[] = [
                'id' => $value['id'],
                'image' => $value['images']['standard_resolution']['url'],
                'type' => 'Instagram',
                'title' => $value['caption']['text'],
                'url' => $value['link'],
                'by' => '@'.$value['caption']['from']['username'],
                'icon' => 'instagram-icon',
                'post_type' => $value['type'],
                'created_at' => date('d-m-y',strtotime($value['created_time']))
            ];
        }

        return $data;
    }

    private function getTwitterFeed()
    {
       
        $feeds = \Twitter::getUserTimeline(['screen_name' => 'SerialKolor', 'count' => 30, 'format' => 'object']);
        $data = [];
        foreach ($feeds as $value) {
            
            $data[] = [
                'id' => $value->id,
                'image' => '',
                'type' => 'Twitter',
                'duration' => Carbon::parse($value->created_at)->diffForHumans(),
                'title' => \Twitter::linkify($value->text),
                'url' => \Twitter::linkTweet($value),
                'by' => '@'.strtolower($value->user->screen_name),
                'icon' => 'twitter-icon',
                'post_type' => '',
                'created_at' => date('d-m-y',strtotime($value->created_at))
            ];
        }

        return $data;
    }





}
