@php
$cato = DB::table('categories')->where('parent', 0)->where('status','=','approved')->get(); 
   @endphp
<div class="container mt-5" >
    <h2 class="mt-5">Categories</h2>
@foreach($cato as $x)
<div class="card-categories-li hp-mod-card-hover align-left" style="background-color:#eee">
    <a class="card-categories-li-content" href="{{"/viewCategories/$x->categorys_id"}}" title="Serum">
        @php
        $image = DB::table('products')->select('thumbnail')->where('product_name','like' ,'%'.$x->category_name.'%')->limit(1)->get();
        @endphp
            @foreach($image as $img)
       <div class="card-categories-image-container">
          <img class="image" src="{{asset('/storage/thumbnails/' . $img->thumbnail) }}" alt="">
       </div>
       @endforeach
      <div class="card-categories-name">
        <span class="text text-dark" >
          {{$x->category_name}}
        </span>
      </div>
    </a>
</div>

@endforeach

</div><br>


   

<style>


.hp-mod-price-text {
    text-decoration: line-through
}

.inline {
    display: inline-block
}

.align-left {
    float: left
}
a {
    background-color: transparent;
    -webkit-text-decoration-skip: objects
}


img {
    border-style: none
}

.card-categories-ul {
    width: 100%;
    background-color: #fff;
    min-height: 297px
}

.card-categories-ul li:nth-of-type(8n) {
    margin-right: 0
}

.card-categories-name {
    text-align: center;
    margin-top: 10px
}

.card-categories-name .text {
    margin: 8px 12px 0;
    font-size: 14px;
    color: #212121;
    line-height: 18px;
    height: 36px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

a {
    color: #000;
    text-decoration: none;
     /* text-align: center; */
}

/* a,html {
    -webkit-tap-highlight-color: transparent
} */

.card-categories-li {
    width: 12.5%;
    height: 148.5px;
    border-right: 1px solid #e2e2e2;
    border-bottom: 1px solid #e2e2e2;
    background-color: #fff
}

.card-categories-li:nth-child(8n) {
    border-right: 0;
}

.card-categories-li:nth-child(10),.card-categories-li:nth-child(11),.card-categories-li:nth-child(12),.card-categories-li:nth-child(13),.card-categories-li:nth-child(14),.card-categories-li:nth-child(15),.card-categories-li:nth-child(16),.card-categories-li:nth-child(9) {
    border-bottom: 0;
}

.card-categories-li-content {
    width: 100%;
    height: 100%;
    display: block;
    padding-top: 16px;
}
.hp-mod-card-hover:hover {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.25);
    -webkit-transform: all .3s ease-in-out;
    -ms-transform: all .3s ease-in-out;
    transform: all .3s ease-in-out;
    position: relative;
}
.card-categories-image-container {
    margin: 0 auto;
    width: 80px;
    height: 80px
}

.card-categories-image-container .image {
    width: 100%;
    height: 100%
}
.card-channels-img-wrap .image {
    width: 100%;
    height: 100%;
    border-radius: 16px
}
 </style> 