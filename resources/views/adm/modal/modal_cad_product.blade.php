<form method="post" action="{{ url('api/insertProdutos')}}" class="ajax_form2" enctype="multipart/form-data">
<input type="hidden" name="origin" value="site">    
<div class="row">
        <div class="col-sm-6"><input type="text" class="form-control" placeholder="Nome do Produto" name="name" required></div>
        <div class="col-sm-3">
        <select  name="brand" class="form-control" required>
        <option value="" > Marca</option>
        @foreach ($brand as $b)
        <option value="{{$b->id_brand}}" >{{$b->name_brand}}</option>
        @endforeach  
        </select>    
        </div>    
        <div class="col-sm-3">
        <select  name="voltage" class="form-control" required>
        <option value="" > Voltagem</option>
        <option value="110" >110</option>
        <option value="220" >220</option>
        </select>  
        </div>
    </div>
 
    <br>
    <div class="row">
       <div class="col-md-12" >
       <textarea name="" class="form-control" id="" cols="15" rows="5" name="description"></textarea> 
        </div>
    </div>   
    <div class="row">
        <div class="col-md-12"> <br> 
            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </div>
    </div>
</form><br><br>
