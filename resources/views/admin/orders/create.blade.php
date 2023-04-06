@php
$ordernmr = $latestorder->order_number + 1;
@endphp

<x-layout>
  <div class="pl-lg-2 pt-10">
    <label class="font-bold" for="ordernmr">Order nummer</label>
    <input class="bg-gray-200 border border-gray-300 p-2" id="ordernmr" value='{{$ordernmr}}' readonly />

    <table class="_table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Aantal</th>
          <th width="50px">
            <div class="action_container">
              <button class="success" onclick="create_tr('table_body')">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </th>
        </tr>
      </thead>
      <tbody id="table_body">
        <tr>
          <td>
            <select class="p-2 border border-gray-200" type="text" name="product_id" id="product_id">
              @foreach ($products as $product)
              <option id="{{$product->id}}" value="{{$product->title}}">{{$product->title}}</option>
              @endforeach
            </select>
          </td>
          <td>
            <input type="number" class="form_control" placeholder="1" min=0>
          </td>
          <td>
            <div class="action_container">
              <button class="danger" onclick="remove_tr(this)">
                <i class="fa fa-close"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

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
      alert("You Don't have Permission to Delete This ?");
    } else {
      This.closest('tr').remove();
    }
  }
</script>