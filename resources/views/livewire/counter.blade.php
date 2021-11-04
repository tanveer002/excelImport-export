<div class="text-align center">
   <button wire:click="countInc">+</button>
   <h1>{{$count}}</h1>
   <input type="text" wire:modal="name">
   <button wire:click="countDec">-</button>
</div>
