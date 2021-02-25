<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        return view('home');
    }

    
    public function responseTime(Request $request)
    {
        // function pingDomain($domain){
        //     $starttime = microtime(true);
        //     // supress error messages with @
        //     $file      = @fsockopen($domain, 80, $errno, $errstr, 10);
        //     $stoptime  = microtime(true);
        //     $status    = 0;
        
        //     if (!$file){
        //         $status = -1;  // Site is down
        //     }
        //     else{
        //         fclose($file);
        //         $status = ($stoptime - $starttime) * 1000;
        //         $status = floor($status);
        //     }
            
        //     return $status;

        // }
        // return "Hello World";

        $request->link_url= request('link_url');

        if (!filter_var($request->link_url, FILTER_VALIDATE_URL)) 
        {
            return "<script>alert('It is not a valid URL. Please enter a valid URL');  window.location.href='\home'; </script>"; 
        } 
        else
        {
            
            // return '<button class="btn btn success" value="Back to home" href="{{route('home')}}"> ';

            // pingDomain($request->link_url);
            if(!isset($request->link_url))
            // die("enter url");
            $ch;
            $ch = curl_init($request->link_url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            if(curl_exec($ch))
            {
            $info = curl_getinfo($ch);
            // echo 'Took ' . $info['total_time'] . ' seconds to transfer a request to ' . $info['url'];
            }
          
            curl_close($ch);

            return 'Took ' . $info['total_time'] . ' seconds for '  . $info['url'] . ' to respond to the user.';


        }
        

        return redirect('home');
       
        
    }
}
