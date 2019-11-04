<div class="from-group">
  {{Form::label('nombre','Nombre')}}
  {{Form::text('nombre',null,['class'=>'form-control'])}}
  {{Form::label('apellido', 'Apellido')}}
  {{Form::text('apellido',null,['class'=>'form-control'])}}
  {{Form::label('cantidad_sol', 'cantidad_sol')}}
  {{Form::text('cantidad_sol',null,['class'=>'form-control'])}}
  {{Form::label('may_cant_ahorros', 'may_cant_ahorros')}}
  {{Form::text('may_cant_ahorros',null,['class'=>'form-control'])}}
  {{Form::label('referencias', 'referencias')}}
  {{Form::text('referencias',null,['class'=>'form-control'])}}
  {{Form::label('garantia', 'garantia')}}
  {{Form::text('garantia',null,['class'=>'form-control'])}}
  {{Form::label('email', 'email')}}
  {{Form::text('email',null,['class'=>'form-control'])}}
 
</div>
<div class="from-group">
  {{Form::label('avatar', 'Avatar')}}
  {{Form::file('avatar')}}
</div>