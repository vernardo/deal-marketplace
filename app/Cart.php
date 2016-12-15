<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Cart// extends Model
{
    public $items = null; // holds the individual products, meaning the group of products with the quantity of each (array asociativo cuyo índice('key') es el id de producto ('item id'))
    public $totalQty = 0; // un integer con la sumatoria de las cantidades de cada producto agregadas al carrito
    public $totalPrice = 0; // un nro con el total de la compra

    public function __construct($oldCart) // nos permite recrear el carro con la info del carro anterior
    {
        if($oldCart) {
          $this->items = $oldCart->items;
          $this->totalQty = $oldCart->totalQty;
          $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) { // función para agregar nuevos productos al carro
      $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item]; // configuro un array asoc donde guardar la info de dicho item: cantidad, precio, y el item mismo. Usaré los valores que le paso por defecto solo si no estaba en el carrito
      if ($this->items) { // si hay items en el carrito (o sea, en el objeto o instancia de la clase 'Cart')
        if (array_key_exists($id, $this->items)) {// si el item que quiero agregar ya está en el array de items del carrito (http://php.net/manual/en/function.array-key-exists.php)
          $storedItem = $this->items[$id]; // sobrescribotraigo el array de ese item específico del carrito con la data ya disponible
        }
      }
      $storedItem['qty']++;
      $storedItem['price'] = $item->price * $storedItem['qty']; // notar que "$storedItem['price']" sería mejor llamado "$storedItem['itemSubtotal']"
      $this->items[$id] = $storedItem; // crea un nuevo elem guardando en la posición '$id' (id del producto cliqueado) del array asoc 'items' del objeto 'Cart' ...
      $this->totalQty++;
      $this->totalPrice += $item->price; // el total
    }

    public function reduceByOne($id) {
      $this->items[$id]['qty']--; // access the item by id and reduce its quantity by 1
      $this->items[$id]['price'] -= $this->items[$id]['item']['price']; // subtotal de ese producto
      $this->totalQty--;
      $this->totalPrice -= $this->items[$id]['item']['price']; // total de la orden

      if ($this->items[$id]['qty'] <= 0) { // si ya no tenemos unidades de dicho producto en el carrito
        unset($this->items[$id]); // quitar del carrito (guardado en sesión) ese producto
      }
    }

    public function removeItem($id) {
      $this->totalQty -= $this->items[$id]['qty']; // quita todas las unidades de ese producto
      $this->totalPrice -= $this->items[$id]['price']; // quita el monto total en $ de ese producto
      unset($this->items[$id]);
    }
}
