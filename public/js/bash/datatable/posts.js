var DatatableRemoteAjaxDemo = {
    init: function() {
    var t;
    t = $(".m_datatable").mDatatable({
        data: {
            type: "remote",
            source: {
                read: {
                    url: "/api/posts",
                    map: function(t) {
                        var e = t;
                        return void 0 !== t.data && (e = t.data), e
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'GET',
                }
            },
            pageSize: 24, 
            saveState: {
                cookie: false,
                webstorage: false
            }, 
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true
        },
        layout: {
            scroll: !1,
            footer: !1
        },
        translate: {
            records: {
                processing: "Подождите...",
                noRecords: "Нет записей"
            },
            toolbar: {
                pagination:{
                    items: {
                        default: {
                            first: 'Начало',
                            prev: 'Пред.',
                            next: 'След.',
                            last: 'Конец',
                            more: 'больше',
                            input: 'Номер страницы',
                            select: 'Выберите'
                        },
                        info: '{{start}} - {{end}} из {{total}} записей'
                    }
                }
            }
        },
        sortable: !0,
        pagination: !0,
        toolbar: {
            items: {
                pagination: {
                    pageSizeSelect: [24, 30, 50, 100]
                }
            }
        },
        search: {
            input: $("#generalSearch")
        },
        rows: {
            autoHide: false,
        },
        columns: [{
            field: "id",
            title: "#",
            width: 40,
            textAlign: "center"
        }, {
            field: "thumb",
            title: "Миниатюра",
            attr: {
                nowrap: "nowrap"
            }
        }, {
            field: "append_title",
            title: "Название",
            width: 300,
        }, {
            field: "append_category",
            title: "Категория",
        }, {
            field: "append_langs",
            title: "Языки",
        }, {
            field: "append_date",
            title: "Дата",
        }, {
            field: "viewed",
            title: "<i class='fa fa-eye'></i>",
            width: 50,
        }, {
            field: "append_status",
            title: "Статус",
        }, {
            field: "is_main",
            title: "Действия",
            width: 100,
            template: function(t) {
                return '\t\t\t\t\t\t<a href="/bashkaruu/posts/'+ t.id +'/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Өзгөртүү">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<a href="/bashkaruu/posts/'+ t.id +'" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Көрүү">\t\t\t\t\t\t\t<i class="la la-rocket"></i>\t\t\t\t\t\t</a>\t\t\t\t\t'
            }
        }]
    }), $("#m_form_status").on("change", function() {
            t.search($(this).val(), "category")
        }), $("#m_form_status").selectpicker()
    }
};
jQuery(document).ready(function() {
    DatatableRemoteAjaxDemo.init()
});