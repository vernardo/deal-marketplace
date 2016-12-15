@foreach ($products->chunk(4) as $productChunk)
  <div class="row">
    @foreach ($productChunk as $product)

      <div class="col-sm-6 col-md-3 col-lg-3">
        <div class="thumbnail">
            <img src="@php echo asset('storage');@endphp/./{{ $product->thumbnail }}" alt="Book Image" class="img-responsive" style="max-height:200px;">
            <div class="caption">
                <h4>{{ $product->title }}</h4>
                <p class="author">{{ $product->author }}</p>
                <div class="clearfix">
                    <div class="pull-left price" style="font-weight: bold;
                    font-size: 16px;">${{$product->price}}</div>
                    <a href="{{ route('product.addToCart', ['id' => $product->id ]) }}" class="btn btn-success pull-right" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    <a href="./products/{{$product->id}}" class="btn btn-default pull-right" role="button" style="position:relative;right:5px;"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
      </div>

    @endforeach
  </div>
@endforeach
{{ $products->links() }}
