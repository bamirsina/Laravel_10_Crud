<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Warehouse Inventory</h1>
        <a href="{{ route('warehouse.create') }}" class="btn btn-success btn-sm float-end">Add</a>
        <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->amount }}</td>
                <td>
                    @php $total = $product['price'] * $product['amount'] @endphp
                    <form method="POST" action="{{ url('/warehouse/retrieve/'.$product->id) }}">
                            @csrf
                            <input type="number" id="quantity" name="quantity" min="1" >
                        <input type="submit" value="Submit">
                    </form>
                    <form method="POST" action="{{ route('warehouse.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
{{--                        <div>Total Price:  {{$product->price *= ('')}}</div>--}}

                    </form>
            @endforeach
            <tfoot>
            <tr>
                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
            </tr>
        </tbody>
            <tfoot>
{{--            <tr>--}}
{{--                <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>--}}
{{--            </tr>--}}

            </tfoot>
        </table>
</div>
{{--<script type="text/javascript">--}}

{{--    $(".update-cart").change(function (e) {--}}
{{--        e.preventDefault();--}}

{{--        var ele = $(this);--}}

{{--        $.ajax({--}}
{{--            url: '{{ route('update.cart') }}',--}}
{{--            method: "patch",--}}
{{--            data: {--}}
{{--                _token: '{{ csrf_token() }}',--}}
{{--                id: ele.parents("tr").attr("data-id"),--}}
{{--                action: ele.parents("tr").find(".quantity").val()--}}
{{--            },--}}
{{--            success: function (response) {--}}
{{--                window.location.reload();--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
