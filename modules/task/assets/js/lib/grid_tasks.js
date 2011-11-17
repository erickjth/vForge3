Ext.require([
    'Ext.data.*',
    'Ext.grid.*',
    'Ext.tree.*',
    'Ext.util.*'
]);
Ext.define('Task_model', {
        extend: 'Ext.data.Model',
        fields: [
            {name: 'id',     type: 'integer'},
            {name: 'priority',     type: 'string'},
            {name: 'courseid', type: 'integer'},
            {name: 'parent', type: 'integer'},
            {name: 'name', type: 'string'},
            {name: 'description', type: 'string'},
            {name: 'percent', type: 'integer'},
            {name: 'state', type: 'string'},
            {name: 'user_to', type: 'integer'},
            {name: 'user_from', type: 'integer'},
            {name: 'date_start', type: 'string'},
            {name: 'date_end', type: 'string'},
            {name: 'created', type: 'integer'},
        ]
    });
    
Task={};
Task.tree = {};
Task.store = {};

Ext.onReady(function() {
    Ext.QuickTips.init();
    //Ext.state.Manager.setProvider(Ext.create('Ext.state.CookieProvider'));

    Task.store = Ext.create('Ext.data.TreeStore', {
        model: 'Task_model',
        autoLoad: true,
        autoSync: true,
        proxy: 
        { 
            type: 'ajax', 
            url: 'task/get_tasks' 
        }, 
        reader:{
            type: 'json'
        },
        root: {
            name: 'Root',
            id: 'root',
            expanded: true
        },
        clearOnLoad: false,
        folderSort: false
    });

    Task.tree = Ext.create('Ext.tree.Panel', {
        width: "100%",
        height: 400,
        renderTo: 'tree_task_list',
        collapsible: true,
        rootVisible: false,
        store: Task.store,
        multiSelect: false,
        viewConfig: {    
            loadMask: true
        },
        columns: [
        {
            xtype: 'treecolumn',
            text: 'Tarea',
            flex: 2,
            dataIndex: 'name',
            sortable: true
        },{
            text: 'Prioridad',
            flex: 1,
            sortable: true,
            dataIndex: 'priority'
        },{
            text: 'Avance',
            flex: 1,
            dataIndex: 'percent',
            renderer:  render_percent,
            sortable: true
        },{
            text: 'Inicio',
            flex: 1,
            dataIndex: 'date_start',
            sortable: true
        },{
            text: 'Finaliza',
            flex: 1,
            dataIndex: 'date_end',
            sortable: true
        },{
            text: 'Asignado a',
            flex: 1,
            dataIndex: 'user_to',
            sortable: true
        },{
            text: 'Estado',
            flex: 1,
            dataIndex: 'state',
            sortable: true
        },{
            xtype: 'actioncolumn',
            flex: 0.5,
            items: [
            {
                icon   : 'assets/images/icons/add.png',  // Use a URL in the icon config
                tooltip: 'Agregar sub-tarea',
                handler: function(grid, rowIndex, colIndex) {
                    var url;
                    try{
                        var rec = grid.getStore().getAt(rowIndex);
                        url = 'task/add?pid='+rec.get("id");
                    }catch(e){
                        url = 'task/add?pid=0';
                    };
                    load_remote_content_html(url,'add-task-content');
                }
            },{
                icon   : 'assets/images/icons/pencil.png',  // Use a URL in the icon config
                tooltip: 'Editar tarea',
                handler: function(grid, rowIndex, colIndex) {
                    var url;
                    try{
                        var rec = grid.getStore().getAt(rowIndex);
                        
                        url = 'task/edit?tid='+rec.get("id");
                        
                        load_remote_content_html(url,'add-task-content');
                        
                        
                    }catch(e){
                        alert("Error al tratar de seleccionar tarea.");
                    };
                    
                    
                }
            },{
                icon   : 'assets/images/icons/delete.png',  // Use a URL in the icon config
                tooltip: 'Eliminar tarea',
                handler: function(grid, rowIndex, colIndex) {
                    //var rec = store.getAt(rowIndex);
                    //alert("Sell " + rec.get('c_child'));
                    alert("Eliminar tarea");
                }
            }
            ]
        }
            
        ]
    });

});



function reload_task_list(){
    //Task.store.removeAll();
    //var root = Task.store.getRootNode();
    var root = Task.store.getNodeById(1);
    
    Task.tree.getStore().getProxy().url = 'task/get_tasks';
    Task.tree.getStore().load({
        node: root
    });

    
    //Task.store.load({node:root});
}
function render_percent(value,p,r){
    if( value >=0 && value<= 100 ){
        return Ext.String.format('{0}%', value);
    }else{
        return '-%';
    }
    
}