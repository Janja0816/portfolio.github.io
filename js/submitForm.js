function submitContact(){
    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#message").val();

    var messageBody = "Email: " + email + ", Message:" + message;

    // $.ajax({
    //     type:"POST",
    //     url:"php/subjectForm.php",
    //     data:{name:name,email:email,subject:subject,message:message},
    //     success:function(response){
    //         console.log(response)
    //     },
    //     error:function(xhr,status,err){
    //         console.log(xhr);
    //     }
    // });
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "nikolajanjicrs@gmail.com",
        Password : "EC29D1DA526B4248B71B10352F46CD4A5F99",
        To : 'nikolajanjicrs@gmail.com',
        From : "nikolajanjicrs@gmail.com",
        Subject : subject,
        Body : messageBody
    }).then(
    //   message => alert(message)
    );

}

