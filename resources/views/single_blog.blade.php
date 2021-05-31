@extends('website')
@section('mainsite')

   <!-- breadcrumb start-->
   <section class="breadcrumb breadcrumb_bg">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcrumb_iner">
                  <div class="breadcrumb_iner_item">
                     <h2>Blog Single</h2>
                     <p>Home<span>/</span>Blog Single</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
            @foreach($posts as $post)

               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{asset($post->image)}}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>
                        {{$post->title}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="far fa-user"></i> Medical</a></li>

                        <li class="post-right"><a href="#."><a href="#."><i class="fa fa-eye">
                        
                           <BlogConuter/>

                        </i>

                        
                        
                     </ul>
                     <p class="excert">
                        {!!$post->description!!}
                     </p>
                  </div>
                  @endforeach
               </div>




               <div id="disqus_thread"></div>


                <script>


                var disqus_config = function () {
                    this.page.url = null  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };

                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://healthcare-9.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                            



            </div>
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->







@endsection