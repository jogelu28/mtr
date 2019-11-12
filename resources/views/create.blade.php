@extends('layouts.app', ['page' => __('create'), 'pageSlug' => 'create'])
@section('title', 'Personas Create')
@section('content')

<!---{!!Form::open(['route'=>'personas.store','method'=>'POST','files'=>'true'])  !!}
@include('form')
{{Form::submit('Guardar',['class'=>'btn btn_primary'])}}
{!!Form::close()!!}---->

<!DOCTYPE html>
<html>
<head>
   <title></title>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
</head>
<body>
<div class="container">
   <div class="row">
       <div class="col-sm-8 col-sm-offset-2">
           <div class="panel panel-default">
               <div class="panel-heading">Bienvenido a motor doble j</div>
               <div class="panel-body" id="app">
                       <form method="POST" action="/vuejs/form" class="form-horizontal" @submit.prevent="onSubmit" >
                       {{ csrf_field() }}
                           <div :class="['form-group', persona.nombre ? 'has-error' : '']" >
                               <label for="nombre" class="col-sm-4 control-label">Nombre</label>
                               <div class="col-sm-6">
                                   <input id="nombre" name="nombre" value=""  autofocus="autofocus" class="form-control" type="text" v-model="form.nombre">
                                   <span v-if="persona.nombre" :class="['label label-danger']">@{{ persona.nombre[0] }}</span>
                               </div>
                           </div>
                           <div :class="['form-group', persona.apellido ? 'has-error' : '']" >
                               <label for="apellido" class="col-sm-4 control-label">Apellido</label>
                                   <div class="col-sm-6">
                                       <input id="apellido" name="apellido" class="form-control" type="text" v-model="form.apellido">
                                       <span v-if="persona.apellido" :class="['label label-danger']">@{{ persona.apellido[0] }}</span>
                                   </div>
                               </div>
                               <div :class="['form-group', persona.cantidad_sol ? 'has-error' : '']" >
                               <label for="cantidad_sol" class="col-sm-4 control-label">cantidad_sol</label>
                                   <div class="col-sm-6">
                                       <input id="cantidad_sol" name="cantidad_sol" class="form-control" type="text" v-model="form.cantidad_sol">
                                       <span v-if="persona.cantidad_sol" :class="['label label-danger']">@{{ persona.cantidad_sol[0] }}</span>
                                   </div>
                               </div>
                               <div :class="['form-group', persona.may_cant_ahorros ? 'has-error' : '']" >
                               <label for="may_cant_ahorros" class="col-sm-4 control-label">may_cant_ahorros</label>
                                   <div class="col-sm-6">
                                       <input id="may_cant_ahorros" name="may_cant_ahorros" class="form-control" type="text" v-model="form.may_cant_ahorros">
                                       <span v-if="persona.may_cant_ahorros" :class="['label label-danger']">@{{ persona.may_cant_ahorros[0] }}</span>
                                   </div>
                               </div>
                               <div :class="['form-group', persona.referencias ? 'has-error' : '']" >
                               <label for="referencias" class="col-sm-4 control-label">referencias</label>
                                   <div class="col-sm-6">
                                       <input id="referencias" name="referencias" class="form-control" type="text" v-model="form.referencias">
                                       <span v-if="persona.referencias" :class="['label label-danger']">@{{ persona.referencias[0] }}</span>
                                   </div>
                               </div>
                                <div :class="['form-group', persona.garantia ? 'has-error' : '']" >
                               <label for="garantia" class="col-sm-4 control-label">garantia</label>
                                   <div class="col-sm-6">
                                       <input id="garantia" name="garantia" class="form-control" type="text" v-model="form.garantia">
                                       <span v-if="persona.garantia" :class="['label label-danger']">@{{ persona.garantia[0] }}</span>
                                   </div>
                               </div>
                                <div :class="['form-group', persona.email ? 'has-error' : '']" >
                               <label for="email" class="col-sm-4 control-label">email</label>
                                   <div class="col-sm-6">
                                       <input id="email" name="email" class="form-control" type="text" v-model="form.email">
                                       <span v-if="persona.email" :class="['label label-danger']">@{{ persona.email[0] }}</span>
                                   </div>
                               </div>
                                <div :class="['form-group', persona.avatar ? 'has-error' : '']" >
                               <label for="avatar" class="col-sm-4 control-label">Selecciona para mandar una imagen de perfil</label>
                                   <div class="col-sm-6">
                                       <input id="avatar" name="avatar" class="form-control" type="file" v-model="form.avatar">
                                       <span v-if="persona.avatar" :class="['label label-danger']">@{{ persona.avatar[0] }}</span>
                                   </div>
                               </div>
                               <span v-if="success" :class="['label label-success']">Record submitted successfully!</span>
                               <button type="submit" class="btn btn-primary">
                                   Send
                               </button>
                       </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script type="text/javascript">
   const app = new Vue({
       el: '#app',
       data: {
           form: {
               nombre : '',
               apellido: '',
               cantidad_sol: '',
               may_cant_ahorros: '',
               referencias: '',
               garantia: '',
               email: '',
               avatar: '',
           },
           persona: [],
           success : false,    
       },
       methods : {
           onSubmit() {
               dataform = new FormData();
               dataform.append('nombre', this.form.nombre);
               dataform.append('apellido', this.form.apellido);
                dataform.append('cantidad_sol', this.form.cantidad_sol);
                 dataform.append('may_cant_ahorros', this.form.may_cant_ahorros);
                  dataform.append('referencias', this.form.referencias);
                   dataform.append('garantia', this.form.garantia);
                    dataform.append('email', this.form.email);
                    dataform.append('avatar', this.form.avatar);
               console.log(this.form.nombre);
               axios.post('/create', dataform).then( response => {
                   console.log(response);
                   this.persona = [];
                   this.form.nombre = '';
                   this.form.apellido = '';
                   this.form.cantidad_sol = '';
                   this.form.may_cant_ahorros = '';
                   this.form.referencias = '';
                   this.form.garantia= '';
                   this.form.email= '';
                   this.form.avatar= '';
                   this.success = true;
               } ).catch((error) => {
                        this.persona = error.response.data.errors;
                        this.success = false;
                   });
           }
       }
   });
</script>
</body>
</html>
@endsection