<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    @if (Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success(" {{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }}");
            break;
    }
    @endif

</script>
<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51J8zknBeGzOCnV4g8pB4jh6D81BHADkY0sDchp2vHWR4r84hy4SOxAVFkARyyBrUCfLM0RbMp67qpseP5quf4XAp00701LPkkF');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        stripe.createToken(card).then(function (result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><span id="product_name"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="..." alt="Card image cap" id="product_image"
                                 width="200px" height="200px">

                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Price: <strong class="text-danger"
                                                                       id="product_price"></strong>
                                <del id="product_discount_price"></del>
                            </li>
                            <li class="list-group-item">Code: <strong id="product_code"></strong></li>
                            <li class="list-group-item">Category: <strong id="product_category"></strong></li>
                            <li class="list-group-item">Brand: <strong id="product_brand"></strong></li>
                            <li class="list-group-item">Stock: <span class="badge badge-success" id="available"
                                                                     style="background: #28a745; float: none!important;"></span>
                                <span class="badge badge-danger" id="out"
                                      style="background: #dc3545; float: none!important;"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" id="area">
                            <label for="size">Choose Size</label>
                            <select class="form-control" id="product_size" name="size">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color">Choose Color</label>
                            <select class="form-control" id="product_color" name="color">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" id="product_qty" value="1" min="1">
                        </div>
                        <input type="hidden" id="product_id">
                        <button type="submit" class="btn btn-primary" onclick="addToCart()">Add Cart</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function productView(id) {
        $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            dataType: 'json',
            success: function (data) {
                // console.log(data);


                $("#product_name").text(data.product.product_name_en);
                $("#product_code").text(data.product.product_code);
                $("#product_category").text(data.product.category.category_name_en);
                $("#product_brand").text(data.product.brand.brand_name_en);
                $("#product_size").text(data.product.product_size_en);
                $("#product_color").text(data.product.product_color_en);
                $("#product_qty").text(data.product.product_qty);
                $("#product_image").attr('src', '/' + data.product.product_thumbnail);

                $("#product_id").val(id);
                $("#qty").val(1);

                $('select[name="color"]').empty();
                $.each(data.color, function (key, value) {
                    $('select[name="color"]').append('<option value=" ' + value + ' ">' +
                        value + '</option>');
                });

                $('select[name="size"]').empty();
                $.each(data.size, function (key, value) {
                    $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                        '</option>');
                    if (data.size == "") {
                        $("#area").hide();
                    } else {
                        $("#area").show();
                    }
                });

                if ((data.product.discount_price == data.product.selling_price) || (data.product.discount_price == 0) || (data.product.discount_price == null)) {
                    $("#product_price").text(data.product.selling_price);
                } else {
                    $("#product_price").text(data.product.selling_price);
                    $("#product_discount_price").text(data.product.discount_price);
                }

                if (data.product.product_qty > 0) {
                    $("#available").text("");
                    $("#stock").text("");
                    $("#available").text("Available");
                } else {
                    $("#available").text("");
                    $("#stock").text("");
                    $("#out").text("Out of stock");
                }
            }
        });
    }

</script>
<!-- End Modal -->

<!-- Add to Cart -->
<script>
    function addToCart() {
        var id = $("#product_id").val();
        var product_name = $("#product_name").text();
        var product_color = $("#product_color option:selected").text();
        var product_size = $("#product_size option:selected").text();
        var product_qty = $("#product_qty").val();
        $.ajax({
            type: 'POST',
            url: '/cart/store/' + id,
            dataType: 'json',
            data: {
                product_name: product_name,
                product_color: product_color,
                product_size: product_size,
                product_qty: product_qty,
            },
            success: function (data) {
                miniCart();
                $("#close").click();
                // console.log(data);
                const Toast = Swal.mixin({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }
            }
        });
    }

</script>
<script>
    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/minicart/',
            dataType: 'json',

            success: function (response) {
                var html = "";
                $("#mini_qty").text(response.miniCartQty);
                $("#sub_total").text(response.miniCartTotal);
                $.each(response.miniCart, function (key, value) {
                    html += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image">
                                            <a href="detail.html">
                                            <img src="/${value.options.image}" alt="">
                                            </a>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">${value.price} x${value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                        <button type="submit" id="${value.rowId}"  onclick="remove(this.id)">
                                           <i class="fa fa-trash"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>`;
                });
                $("#miniCart").html(html);
            }
        });
    }

    miniCart();

    function remove(rowId) {
        $.ajax({
            type: 'GET',
            url: '/product/minicart-remove/' + rowId,
            dataType: 'json',
            success: function (data) {
                miniCart();
                cart();
                const Toast = Swal.mixin({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }
            }
        });
    }
</script>
<script>
    function addWishlist(product_id) {
        $.ajax({
            type: 'POST',
            url: 'user/product/add-wishlist/' + product_id,
            dataType: 'json',
            success: function (data) {
                const Toast = Swal.mixin({
                    position: 'top-end',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        type: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        type: 'error',
                        title: data.error,
                    })
                }
            }
        })
    }

    function wistlist() {
        $.ajax({
            type: 'GET',
            url: '/user/getwishlist',
            dataType: 'json',
            success: function (response) {
                var html = "";
                $.each(response, function (key, value) {
                    html += `<tr>
                                    <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                        <div class="price">
                                            ${value.product.discount_price == null || value.product.discount_price == value.product.selling_price ?
                        `${value.product.selling_price}` : `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                    }
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                                         <button class="btn btn-primary icon"
                                                                type="button" data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                id="${value.product_id}"
                                                                onclick="productView(this.id)">Add To Cart
                                                        </button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                       <button type="submit" style="border: none; border-radius: 10px" id="${value.id}" onclick="removeWishlist(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`;
                })
                $('#wishlist').html(html);
            }
        });
    }

    wistlist()

    function removeWishlist(id) {
        $.ajax({
            type: 'GET',
            url: '/user/wishlist/remove/' + id,
            dataType: 'json',
            success: function (data) {
                wistlist();
                const Toast = Swal.mixin({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }
            }
        });
    }
</script>
<script>
    function cart() {
        $.ajax({
            type: 'GET',
            url: '/get-mycart',
            dataType: 'json',
            success: function (response) {
                var html = "";
                $.each(response.miniCart, function (key, value) {
                    html += `<tr>
                                    <td>
						                <img src="/${value.options.image}" alt="" width="80px" >
					                </td>

                                    <td class="col-md-3">
                                        <div class="product-name"><a href="{{url('/')}}">${value.name}</a></div>
                                         <div class="price">
                                             ${value.price}
                                         </div>
                                    <td class="col-md-2">
                                     ${value.options.color}
                                    </td>
                                    <td class="col-md-2">
                                     ${value.options.size == null ? `None` : value.options.size}
                                    </td>
                                     <td class="col-md-2">
                                        <button type="submit" id="${value.rowId}" onclick="decrement(this.id)">-</button>
                                        <input type="text" value="${value.qty}" min="1"  style="width: 30px; border-color: black; border-radius: 5px">
                                        <button type="submit" id="${value.rowId}" onclick="process(this.id)">+</button>
                                    </td>
                                    <td class="col-md-2">
                                          ${value.subtotal}
                                    </td>
                                    <td class="col-md-1 close-btn">
                                       <button type="submit" style="border: none; border-radius: 10px" id="${value.rowId}" onclick="removeMyCart(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`;
                })
                $("#myCart").html(html);
            }
        });
    }

    cart();

    function removeMyCart(rowId) {
        $.ajax({
            type: 'GET',
            url: '/mycart/remove/' + rowId,
            dataType: 'json',
            success: function (data) {
                couponCal();
                cart();
                miniCart();
                const Toast = Swal.mixin({
                    position: 'top-end',
                    icon: 'success',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                    })
                }
            }
        });
    }

    function process(rowId) {
        $.ajax({
            type: 'GET',
            url: '/mycart/process/' + rowId,
            dataType: 'json',
            success: function (data) {
                couponCal();
                cart();
                miniCart();
            }
        });
    }

    function decrement(rowId) {
        $.ajax({
            type: 'GET',
            url: '/mycart/decrement/' + rowId,
            dataType: 'json',
            success: function (data) {
                couponCal();
                cart();
                miniCart();
            }
        });
    }

    function apply() {
        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type: 'POST',
            url: '{{url('/coupon-apply')}}',
            dataType: 'json',
            data: {coupon_name: coupon_name},
            success: function (data) {
                couponCal();
                if (data.validaty) {
                    $("#putCoupon").hide();
                }

                // console.log(data);
                const Toast = Swal.mixin({
                    position: 'top-end',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
            }
        });
    }

</script>
<script>
    function couponCal() {
        $.ajax({
            type: 'GET',
            url: '/coupon-cal',
            dataType: 'json',
            success: function (data) {
                if (data.total) {
                    $('#couponField').html(
                        `  <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">${data.total}</span>
                                    </div>
                                </th>
                            </tr>`
                    )
                } else {
                    $('#couponField').html(
                        `   <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">${data.subtotal}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Coupon
                                        <button type="submit" onclick="couponRemove()">x</button>
                                        <span style="padding-left: 25px; color: red" "> ${data.coupon_name}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        Discount<span class="inner-left-md">${data.discount}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                        <span style="color: green">Grand Total</span><span style="padding-left: 68px; color: green">${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>`
                    )
                }
            }
        });
    }

    couponCal();

    function couponRemove() {
        $.ajax({
            type: 'GET',
            url: '/coupon-remove',
            dataType: 'json',
            success: function (data) {
                couponCal();
                $("#putCoupon").show();
                $("#coupon_name").val('');
                const Toast = Swal.mixin({
                    position: 'top-end',
                    toast: true,
                    showConfirmButton: false,
                    timer: 3000
                })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                    })
                } else {
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                    })
                }
            }
        });
    }
</script>
</body>

</html>
