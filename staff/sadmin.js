<script>
    function validateForm() {
        var dep = document.forms["myform"]["dep"].value;
        var etype = document.forms["myform"]["etype"].value;
        var ename = document.forms["myform"]["ename"].value;
        var event = document.forms["myform"]["event"].value;
        var hall = document.forms["myform"]["hall"].value;
        var edate = document.forms["myform"]["edate"].value;
        var stime = document.forms["myform"]["stime"].value;
        var etime = document.forms["myform"]["etime"].value;

        // Check if any of the required fields are empty
        if (dep == "" || etype == "" || ename == "" || event == "" || hall == "" || edate == "" || stime == "" || etime == "") {
            alert("Please fill in all required fields.");
            return false; // Prevent form submission
        }

        // Additional validation rules can be added here if needed

        return true; // Allow form submission
    }
</script>
