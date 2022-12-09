<?php

namespace App\Http\Controllers;

use App\Models\all_user;
use App\Models\buyer;
use App\Models\login;
use App\Models\post;
use App\Rules\quantiRule;
use App\Rules\quantiRule2;
use Illuminate\Http\Request;

class postModel
{
    var $quantity;
    var $price;
    var $post;
}

class PostController extends Controller
{
    public function Post()
    {
        return view("buyer.post");
    }

    public function PostSubmit(Request $request)
    {
        // dd("m = " . $request->m . ", l = " . $request->l . ", xl = " . $request->xl . ", xxl = " . $request->xxl . ", xxxl = " . $request->xxxl);
        session()->put("m", $request->m);
        session()->put("l", $request->l);
        session()->put("xl", $request->xl);
        session()->put("xxl", $request->xxl);
        session()->put("xxxl", $request->xxxl);
        $this->validate(
            $request,
            [
                "title" => ["required", "regex:/^[a-z ,.'-]+$/i", "min:10", "max:100"],
                "category" => ["required"],
                "expire_date" => ["required", "date"],
                "price" => ["required", "numeric"],
                "m" => ["required", "numeric", new quantiRule],
                "l" => ["required", "numeric", new quantiRule],
                "xl" => ["required", "numeric", new quantiRule],
                "xxl" => ["required", "numeric", new quantiRule],
                "xxxl" => ["required", "numeric", new quantiRule, new quantiRule2],
                "description" => ["required", "min:5", "max:1000"],
                "design" => ["required", "mimes:jpg,png,jpeg,webp"]
            ],
            [
                // "m.min", "xl.min", "xxl.min", "xxl.min", "l.min" => "You have to order at least 20 per size or you can put 0 if you don't want any particular size.",
                // "l.min" => "You have to order at least 20.",
                // "xl.min" => "You have to order at least 20.",
                // "xxl.min" => "You have to order at least 20.",
                // "xxl.min" => "You have to order at least 20.",
                "design.mines" => "Only jpg, jpeg, png, webp files are allowed."
            ]

        );

        if ($request->design) {
            $filename = date("d-m-Y_H-i-s") . '_profile_' . session()->get('email') . '.' . $request->design->extension();
            $filePath = $request->file('design')->storeAs('uploads', $filename, 'public');


            if ($filePath) {
                $quantity2 = "m = " . $request->m . ", l = " . $request->l . ", xl = " . $request->xl . ", xxl = " . $request->xxl . ", xxxl = " . $request->xxxl;
                $post = new post();
                $post->title = $request->title;
                $post->description = $request->description;
                $post->category = $request->category;
                $post->quantity = $quantity2;
                $post->price = $request->price;
                $post->buyer_id = session()->get('id');
                $post->photo = $filename;
                $post->expire_date = $request->expire_date;
                $post->post_date = date('h:i:s A m/d/Y', strtotime(date('h:i:s a m/d/Y')));
                $post->status = "post";
                $post->save();

                //dd("posted");
                return redirect()->route('Post');
            }
            return redirect()->route('Post');
        }
    }

    public function GetPosts(Request $request)
    {

        $data = $request->id;
        $token = $request->header("Authorization");
        $token = json_decode($token);
        // return response($token,200);
        if ($token) {
            $check_token = login::where('token', $token->access_token)->where("logout_time", NULL)->first();
            if ($check_token) {
                $user = all_user::where("id", $check_token->all_users_id)->first();
                if ($user) {
                    $buyer = buyer::where('email', $user->email)->first();
                    if ($buyer) {
                        if ($data == "get") {
                            $posts = post::where("status", "post")->where("buyer_id", $buyer->id)->get();
                            if ($posts) {
                                return response($posts, 200);
                            }
                        } else if ($data == "atoz") {
                            $posts = post::where("status", "post")->where("buyer_id", $buyer->id)->orderBy('title', 'asc')->get();
                            if ($posts) {
                                return response($posts, 200);
                            }
                        } else if ($data == "ztoa") {
                            $posts = post::where("status", "post")->where("buyer_id", $buyer->id)->orderBy('title', 'desc')->get();
                            if ($posts) {
                                return response($posts, 200);
                            }
                        }
                    }
                }
            }
        }
        return response("Invalid", 401);

        // if ($request->id == "all") {
        //     $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->paginate(4);
        //     //dd($user);
        //     if ($post) {
        //         return view("buyer.posts")->with("all_post", $post);
        //     } else {
        //         return view("buyer.posts");
        //     }
        // } elseif ($request->name == "title") {
        //     if ($request->id == "AtoZ") {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('title', 'asc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     } else {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('title', 'desc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     }
        // } elseif ($request->name == "cat") {
        //     if ($request->id == "AtoZ") {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('category', 'asc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     } else {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('category', 'desc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     }
        // } elseif ($request->name == "date") {
        //     if ($request->id == "1to9") {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('expire_date', 'asc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     } else {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('expire_date', 'desc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     }
        // } elseif ($request->name == "quantity") {
        //     if ($request->id == "1to9") {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('quantity', 'asc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     } else {
        //         $post = post::where("status", "post")->where("buyer_id", session()->get("id"))->orderBy('quantity', 'desc')->paginate(4);
        //         //dd($user);
        //         if ($post) {
        //             return view("buyer.posts")->with("all_post", $post);
        //         } else {
        //             return view("buyer.posts");
        //         }
        //     }
        // }
    }

    public function PostDetails(Request $request)
    {
        $post = post::where("id", $request->id)->first();

        foreach ($post->bid as $item) {
            if ($item->status == "post") {
                $item->status = "seen";
                $item->save();
            }
        }

        $var = (explode(",", $post->quantity));
        $total_product = 0;
        $total_amount = 0;
        foreach ($var as $item2) {
            $var2 = explode("=", $item2);
            $total_product += (int)$var2[1];
            $total_amount = (int)$post->price * $total_product;
        }

        $p = new postModel();
        $p->price = $total_amount;
        $p->quantity = $total_product;
        $p->post = $post;

        $data = json_encode($p);

        return response($data, 200);
    }

    public function search(Request $request)
    {
        $posts = post::where('title', 'Like', '%' . $request->id . '%')->where("status", "post")->get();
        if ($posts) {
            return response($posts, 200);
        }
        return response("none", 401);

        // if ($request->ajax()) {
        //     $posts = post::where('title', 'Like', '%' . $request->search . '%')->where("status", "post")->get();


        //     if ($posts) {
        //         foreach ($posts as $post) {

        //             $var = (explode(",", $post->quantity));
        //             $total_product = 0;
        //             $total_amount = 0;
        //             foreach ($var as $item2) {
        //                 $var2 = explode("=", $item2);
        //                 $total_product += (int)$var2[1];
        //                 $total_amount = (int)$post->price * $total_product;
        //             }
        //             $total_bid = count($post->bid);

        //             $output .= '<div class="card card-body mt-3">
        //             <div class="media align-items-center align-items-lg-start text-lg-left flex-column flex-lg-row">
        //                 <div class="mr-2 mb-3 mb-lg-0">
        //                     <img src="/storage/uploads/' . $post->photo . '" width="150" height="150" alt="">
        //                 </div>

        //                 <div class="media-body">
        //                     <h6 class="media-title font-weight-semibold">
        //                         <a href="#" data-abc="true">' . $post->title . '</a>
        //                     </h6>

        //                     <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
        //                         <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">' . $post->category . '</a></li>
        //                     </ul>

        //                     <p class="mb-3">' . $post->description . '</p>

        //                     <ul class="list-inline list-inline-dotted mb-0">
        //                         <li class="list-inline-item">Post by <a href="#" data-abc="true">' . $post->user->first_name . ' ' . $post->user->last_name . '</a></li><br>
        //                         <li><p data-abc="true">' . $post->post_date . '</p></li>
        //                         <li><p>From, ' . $post->user->address . '</p></li>
        //                     </ul>
        //                 </div>

        //                 <div class="mt-3 mt-lg-0 ml-lg-3 text-center">

        //                     <h3 class="mb-0 font-weight-semibold">$' . $total_amount . '</h3>
        //                         <div class="text-muted"> Product count <br> <b>' . $total_product . '</b></div>
        //                         <div class="text-muted"> Delivery <br> <b>' . $post->expire_date . '</b> </div>
        //                         <div class="text-muted"> Bid count <br> <b>' . $total_bid . '</b> </div>

        //                     <a href="/buyer/post/details/' . $post->id . '"><button type="button">Details</button></a>
        //                 </div>
        //             </div>
        //         </div>';
        //         }

        //         return response()->json($output);
        //     }
    }

    //return view("buyer.post")->with("search", true);

}
