$("#product-grid").bootgrid(
    {
        labels: {
            noResults: "Nenhum resultado",
            all: 'Todos',
            search: "Pesquisar",
            infos: "Exibindo {{ctx.start}} - {{ctx.end}} de {{ctx.total}} entradas"
        },
        caseSensitive: false,
        searchSettings: {
            delay: 100,
            characters: 3
        },

        formatters: {
            commands: function (column, row)
            {
                return '<a href="/produto/'+row.id+'/edit" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit"></span></a>';
            }
        }
    }
);

if(window.location.pathname === '/produto') {

	var produtos = JSON.parse($('#produtos').val());

	$("#product-grid").bootgrid('append', produtos);
}
