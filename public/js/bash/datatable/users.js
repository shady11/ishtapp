var DatatableRemoteAjaxDemo = {
    init: function() {
        var t;
        t = $(".m_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: 'GET',
                        url: "/api/users",
                        map: function(t) {
                            var e = t;
                            return void 0 !== t.data && (e = t.data), e
                        }
                    }
                },
                pageSize: 10,
                saveState: {
                    cookie: false,
                    webstorage: false
                },
                serverPaging: !0,
                serverFiltering: !0,
                serverSorting: !0
            },
            layout: {
                scroll: !1,
                footer: !1,
                spinner: {
                    message: "Подождите..."
                }
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
                        pageSizeSelect: [10, 20, 30, 50, 100]
                    }
                }
            },
            search: {
                input: $("#generalSearch")
            },
            columns: [{
                field: "id",
                title: "ID",
                width: 40,
                textAlign: "center"
            }, {
                field: "append_fio",
                title: "Имя, фамилия",
                attr: {
                    nowrap: "nowrap"
                }
            }, {
                field: "login",
                title: "Логин"
            }, {
                field: "email",
                title: "Эл.адрес",
                attr: {
                    nowrap: "nowrap"
                }
            }, {
                field: "append_status",
                title: "Статус",
            }, {
                field: "append_role",
                title: "Роль"
            }, {
                field: "created_at",
                title: "Дата создания",
                type: "date",
                format: "MM/DD/YYYY"
            }, {
                field: "actions",
                title: "Actions",
                sortable: !1,
                textAlign: "right",
                overflow: "visible"
            }]
        }), $("#m_form_status").on("change", function() {
            t.search($(this).val(), "active")
        }), $("#m_form_type").on("change", function() {
            t.search($(this).val(), "type")
        }), $("#m_form_status, #m_form_type").selectpicker()
    }
};
jQuery(document).ready(function() {
    DatatableRemoteAjaxDemo.init()
});