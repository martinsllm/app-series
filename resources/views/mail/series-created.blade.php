<x-mail::message>
# {{ $nomeSerie }} criada

A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporada(s) e {{ $episodiosPorTemporada }} episódios por temporada foi criada com sucesso!
 
Acesse aqui:

<x-mail::button :url="route('seasons.index', $idSerie)">
Ver Série
</x-mail::button>

</x-mail::message>
