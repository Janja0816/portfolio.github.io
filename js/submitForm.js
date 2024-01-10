function submitContact(){
    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    $.ajax({
        type:"POST",
        url:"php/subjectForm.php",
        data:{name:name,email:email,subject:subject,message:message},
        success:function(response){
            console.log(response)
        },
        error:function(xhr,status,error){
            console.log("Greska prilikom slanja forme:",status,error);
        }
    });

}