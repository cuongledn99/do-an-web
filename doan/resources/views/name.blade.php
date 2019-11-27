<p>Xin chào {{$data['name']}} !</p>
<br>
<div>Chúng tôi gửi Email này để thông báo cho bạn đơn hàng bạn đã mua</div>
@foreach ($data['product'] as $item)
    <div>
   <b> tên sản phẩm:</b><i>{{$item->name}}</i> <b>Giá:</b> - <i>{{$item->subtotal}} VND<i>
    </div>
@endforeach
<p>Cảm ơn bạn đã tin dùng sản phẩm của chúng tôi</p>