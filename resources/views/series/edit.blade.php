<x-layout title="Editar Série">
    <x-series.form :action="route('series.update', $serie->id)" :name="$serie->name" />
</x-layout>