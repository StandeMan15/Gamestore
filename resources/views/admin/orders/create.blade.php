@php
$ordernmr = $latestorder->order_number + 1;
@endphp

<x-layout>
  <form method="POST" action="{{route('storeAdminOrder')}}">
    @csrf
    <div class="pl-lg-2 pt-10">
      <label class="font-bold" for="ordernmr">{{ __('messages.admin.order.num') }}</label>
      <input class="bg-gray-200 border border-gray-300 p-2" id="ordernmr" name="ordernmr" value='{{$ordernmr}}' readonly />

      <table class="_table">
        <thead>
          <tr>
            <th>{{ __('messages.admin.product.title') }}</th>
            <th>{{ __('messages.admin.product.qty') }}</th>
            <th width="50px">
              <div class="action_container">
                <button class="success" type="button" onclick="create_tr('table_body')">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </th>
          </tr>
        </thead>
        <tbody id="table_body">
          <tr>
            <td>
              <select class="p-2 border border-gray-200" type="text" name="product_name[]" id="product_name">
                @foreach ($products as $product)
                <option id="{{$product->title}}" value="{{$product->title}}">{{$product->title}}</option>
                @endforeach
              </select>
            </td>
            <td>
              <input type="number" class="form_control" name="quantity[]" placeholder="1" value=1 min="0">
            </td>
            <td>
              <div class="action_container">
                <button class="danger" type="button" onclick="remove_tr(this)">
                  <i class="fa fa-close"></i>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <button type="submit">{{ __('messages.form.submit') }}</button>
    </div>
  </form>
</x-layout>

<script>
  function create_tr(table_id) {
    let table_body = document.getElementById(table_id),
      first_tr = table_body.firstElementChild
    tr_clone = first_tr.cloneNode(true);

    table_body.append(tr_clone);

    clean_first_tr(table_body.firstElementChild);
  }

  function clean_first_tr(firstTr) {
    let children = firstTr.children;

    children = Array.isArray(children) ? children : Object.values(children);
    children.forEach(x => {
      if (x !== firstTr.lastElementChild) {
        x.firstElementChild.value = '';
      }
    });
  }

  function remove_tr(This) {
    if (This.closest('tbody').childElementCount == 1) {
      alert("Nee mag nie");
    } else {
      This.closest('tr').remove();
    }
  }
</script>