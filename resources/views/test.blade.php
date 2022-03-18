<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <p>{{ $ticket->created_at }}</p>
        {{-- <button onclick="onClick(event)">Submit</button> --}}
    </div>
    {{-- <script src="https://www.google.com/recaptcha/api.js?render=6LfS1jMeAAAAAOFwhsVv7iJ1PPZFsR7E5wKUZtoe"></script>
    <script>
        function onClick(event) {
            event.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6LfS1jMeAAAAAOFwhsVv7iJ1PPZFsR7E5wKUZtoe', {action: 'submit'}).then(function(token) {
                    console.log(token);
                    // Add your logic to submit to your backend server here.
                });
            });
        }
    </script> --}}
</body>
</html>