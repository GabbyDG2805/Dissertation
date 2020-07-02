var imageList=[];
var extraList=[];
var role='';

$(function()
{

    console.log('ready');


    $("img.roleIcon").click(function()
    {
		console.log($(this).attr('id'));
		$(".roleIcon").removeClass('selected')
       	$(this).addClass('selected');
		// pass the id to db, 
		role = $(this).attr('id');
    });

    $("img.profilePic").click(function()
    {
		console.log($(this).attr('id'));
		$(".profilePic").removeClass('selected')
       	$(this).addClass('selected');
		// pass the id to db, 
		profilePic = $(this).attr('id');
    });

    adddroppable();
    
    //GLOBAL ARRAY
  var allextraitemsarray = [];
    
  $("#guide-button").click(function () {
    //RESET ARRAY 
      var row = null;
    $('.extra').each(function (i, obj) {
        //GET TITLE
      var title = $(obj).find('input').val();
      var desc = $(obj).find('textarea').val();
      console.log(title)
      //CREATE OBJ
        row = {
        "name": title,
        "items": [],
        "desc": desc
      };
      //LOOP THROUGH CHILDREN
      $(obj).children('.itemSlot').each(function (i, obj2) {
        //GET DATA-ASSET FROM DROP 
        //UPDATES DROPPBALE TO $(this).attr("data-asset", pic);
          var pic = $(obj2).data('asset');
        console.log(pic)
        row.items.push(pic);

      });
      //pass to ajax                                 
      allextraitemsarray.push(row);
      console.log(JSON.stringify(allextraitemsarray));
    });

    var guideTitle = $('#guide-title').val();
    var champ = $('#champion').val();
    var patch = $('#patch').val();
    var desc = $('#core-desc').val();
    var build = JSON.stringify(imageList);
    var extra = JSON.stringify(allextraitemsarray);
		
    if(guideTitle ==="" || champ==="" || role==="" || patch===""){
        alert("please fill in all fields");
        return
        }
    console.log("clicked")

    //AJAX DATA IS KEY, VALUE PAIRS I.E DATA: {NAME:VALUE}
    //IN PHP GET POST VALUE BY  $_POST['NAME']
    
    //ADDED DATATYPE JSON AND RETURNED JSON IN PHP
    $.ajax({
        url: './Includes/submitGuide.php',
        data: {GuideTitle: guideTitle, Champion: champ, Role: role, Patch: patch, CoreBuild: build, Description: desc, Situations: extra},
        type: 'post',                  
        async: 'true',
        dataType:'json',
        beforeSend: function() {
            // This callback function will trigger before data is sent
            console.log("pre-send")

        },
        complete: function(data) {
            // This callback function will trigger on data sent/received complete
            console.log("data sent")

        },
        success: function (result) {
            console.log("Success", result);
            if(result)
            {
                alert('post saved');
            }
        
            //inserted
        },
        error: function (request,error) {
            // This callback function will trigger on unsuccessful action   
            console.log("error")           

        }
    });
});
   
    $("#addBuildbtn").click(function () {
        var str = `<h4 class="subheading">Situational Build</h4>
                    <div id="build" class="extra">
                        <div class="form-field">
                            <input class="field" type="text" name="title" placeholder="Situation/Adaptation Name"/>
                        </div>
                        <div data-asset="" class="itemSlot droppable"></div>
                        <div data-asset="" class="itemSlot droppable"></div>
                        <div data-asset="" class="itemSlot droppable"></div>
                        <div data-asset="" class="itemSlot droppable"></div>
                        <div data-asset="" class="itemSlot droppable"></div>
                        <div data-asset="" class="itemSlot droppable"></div>
                        <div class="form-field">
                          <textarea class="description" name="desc" placeholder="Explain this build. . ."></textarea>
                        </div>
                    </div>`;

        $('#buildcontainer').append(str);
        adddroppable();
    });
    
}); //end ready

function adddroppable() {
  $(".draggable").draggable({
    revert: "valid", // when not dropped, the item will revert back to its initial position
    containment: "document",
    helper: "clone",
    cursor: "move"
  });

  $(".droppable").droppable({
    classes: {
      "ui-droppable-active": "ui-state-active",
      "ui-droppable-hover": "ui-state-hover"
    },
    drop: function (event, ui) {
      var pic = ui.draggable.attr("src");
      var droppeditem = $(event.target).parent().prop('class')
      if (droppeditem == "core") {

        imageList.push(pic);
        $(this).css('background-image', 'url(' + pic + ')');
        $(this).attr("data-asset", pic);

      }
      if (droppeditem == "extra") {

        extraList.push(pic);
        $(this).css('background-image', 'url(' + pic + ')');
        $(this).attr("data-asset", pic);

      }
    }
  });
}