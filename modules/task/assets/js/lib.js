$("#add-task-form").validate({
     submitHandler: function(form) {
         var f = $(form);
         var mask= new Ext.LoadMask(Task.tree, {msg:'Saving. Please wait...'});
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
        //root.insertChild( node.id, task );
        root.appendChild(task);
        root.expand();
    }else{
        Task.tree.getStore().load({
            node: root
        });
        root.expand();
    }
    
    
}