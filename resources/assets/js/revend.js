new Vue({
    el: "#revend",

    data: {
        all: [],
        revendedores: [],
        paginated: [],
        filtered: [],
        sortBy: {
            field:  'nome',
            reverse: false
        },
        search: {
            text: '',
            field: 'nome'
        },
        paginate: {
            currentPage: 1,
            totalPages: 0,
            perPage: 5,
            pageNum: []
        }
    },

    methods: {

        setPaginate: function(list) {

            var self = this;

            self.paginate.$set('currentPage', 1);

            /* Divide em pedacos */
            var chunk = _.chunk(list, self.paginate.perPage);

            self.$set('paginated', chunk);

            self.$set('revendedores', chunk[0]);

            self.paginate.$set('totalPages', Math.ceil(list.length / self.paginate.perPage));

            self.paginate.$set('pageNum', _.range(1, self.paginate.totalPages+1));
        },

        doPage: function(ev, page) {

            var self = this;

            ev.preventDefault();

            self.paginate.$set('currentPage', page);

            self.$set('revendedores', self.paginated[self.paginate.currentPage-1]);
        },

        doPrevious: function(ev) {

            var self = this;

            ev.preventDefault();

            if( this.paginate.currentPage > 1)
                this.paginate.$set('currentPage', this.paginate.currentPage-1);

            self.$set('revendedores', self.paginated[self.paginate.currentPage-1]);
        },

        doNext: function(ev) {

            var self = this;

            ev.preventDefault();
            if( this.paginate.currentPage <  this.paginate.totalPages)
                this.paginate.$set('currentPage', this.paginate.currentPage+1);

            self.$set('revendedores', self.paginated[self.paginate.currentPage-1]);
        },

        doFilter: function() {
            var self = this, filtered = self.all;

            if(self.search.text != '')
            {
                filtered = _.filter(self.all, function(rev){
                    if(self.search.field == 'codigo')
                        return rev.codigo.indexOf(self.search.text) > -1;
                    return rev.nome.toLowerCase().indexOf(self.search.text.toLowerCase()) > -1;
                });
            }
            self.$set('filtered', filtered);
            self.setPaginate(filtered);
            self.sortBy.$set('field', 'nome');
            self.sortBy.$set('reverse', false);
        },

        doSortBy: function(ev, field) {

            var self = this, sorted, order = 'asc';

            if(field == self.sortBy.field)
                self.sortBy.$set('reverse', !self.sortBy.reverse);

            self.sortBy.$set('field', field);

            if(self.sortBy.reverse)
                order = 'desc';

            sorted = _.sortByOrder(self.filtered, [field], [order]);

            self.setPaginate(sorted);

        },

        doPerPage: function() {
            this.setPaginate(this.filtered);
            this.sortBy.$set('field', 'nome');
            this.sortBy.$set('reverse', false);
        }
    },

    ready: function() {
        var self = this;
        self.$http.get('/api/revendedores', function (response) {

            self.$set('all', response);
            self.$set('filtered', response);
            self.setPaginate(response);
        });
    }
});