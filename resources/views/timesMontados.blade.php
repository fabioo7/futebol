
<div class="container-fluid d-flex flex-wrap">

<h5>{{$statusPartida}}</h5>
                    @php $cont = 0 @endphp
                    @foreach ($times as $indiceTime => $time)

                    <div class="card " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><b> Time {{$cont = $indiceTime + 1}}</b></h5>
                            <?php $x =($cont % 2 == 0) ? "" : " x " ?>
                            <table while="100%">
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Nivel</th>
                                    <th class="pd">Tipo</th>
                                </tr>
                                @php $e = 1; @endphp
                                @foreach ($time as $jogador)
                                <tr>
                                    <td>{{$e++}}</td>
                                    <td>{{$jogador['name']}}</td>
                                    <td>
                                    @switch($jogador['tipo'])
                                        @case('jogador')<span><img src="https://cdn-icons-png.flaticon.com/512/16/16750.png" width="20" alt=""></span>@break
                                        @case('goleiro')<span><img src="https://cdn-icons-png.flaticon.com/512/1165/1165159.png" width="20" alt=""></span>@break
                                        @endswitch    
                                    
                                   </td>
                                    <td style="text-align: center;">@switch($jogador['nivel'])
                                        @case(1) <span>Ruim</span>@break
                                        @case(2)<span>Amador</span>@break
                                        @case(3)<span>Médio</span>@break
                                        @case(4)<span>Bom</span>@break
                                        @case(5)<span>Ótimo</span>@break
                                        @endswitch</td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                    <span style="font-size: 60px; padding-top: 15%;"> {{$x}} </span>
                    @endforeach
                </div>