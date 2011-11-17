var dates = $( " #task_date_start,#task_date_end" ).datepicker({
    changeMonth:true,
    changeYear:true,
    numberOfMonths: 3,
    onSelect: function( selectedDate ) {
        var option = this.id == "task_date_start" ? "minDate" : "maxDate",
        instance = $( this ).data( "datepicker" ),
        date = $.datepicker.parseDate(
            instance.settings.dateFormat ||
            $.datepicker._defaults.dateFormat,
            selectedDate, instance.settings );
        dates.not( this ).datepicker( "option", option, date );
    }
});

$("#add-task-form").validate({
    errorPlacement: function(error, element) {
        
    },
    submitHandler: function(form) {
        var f = $(form);
        var mask= new Ext.LoadMask(Task.tree, {
            msg:'Saving. Please wait...'
        });
        mask.show();
        $.ajax({
            url: f.attr("action"),
            dataType: 'json',
            type: 'POST',
            data: f.serialize(),
            cache: false,
            success: function(data){
                if( data.success ){
                    insert_node_in_tree(data.task,data.task.parent);
                    clean_remote_content(form);
                }
                 
                mask.hide();
            }
        });
        return false;
    }
});

$("#edit-task-form").validate({
    errorPlacement: function(error, element) {
        
    },
    submitHandler: function(form) {
        var f = $(form);
        var mask= new Ext.LoadMask(Task.tree, {
            msg:'Saving. Please wait...'
        });
        mask.show();
        $.ajax({
            url: f.attr("action"),
            dataType: 'json',
            type: 'POST',
            data: f.serialize(),
            cache: false,
            success: function(data){
                if( data.success ){
                    update_node_in_tree(data.task);
                    clean_remote_content(form);
                }
                 
                mask.hide();
            }
        });
        return false;
    }
});

function insert_node_in_tree(node,parent){
    var root;
    if(parent == 0){
        root = Task.store.getRootNode();
    }else{
        root = Task.store.getNodeById(parent);
    }
       
    if( root.hasChildNodes( ) ){
        var task = Ext.create('Task_model', node);
        root.leaf=false;
        root.insertChild( node.id, task );
        root.expand();
    }else{
        Task.tree.getStore().load({
            node: root
        });
        root.expand();
    }
  
}

function update_node_in_tree(node){
    var root;
    try{
        
        root = Task.store.getNodeById(node.parent);
        
        if( root.hasChildNodes( ) ){
            ele = Task.store.getNodeById(node.id);
            ele.destroy();
            var task = Ext.create('Task_model', node);
            root.leaf=false;
            root.insertChild( node.id, task );
            root.expand();
        }else{
            Task.tree.getStore().load({
                node: root
            });
            root.expand();
        }

    }catch(e){
        alert("Error al actualizar vista de tareas, actualize la pagina manualmente.");
    }

}