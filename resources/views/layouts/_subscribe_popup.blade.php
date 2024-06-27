<div id="emailPopup" class="email-popup">
    <div class="popup-content">
        <span id="closePopup" class="close">&times;</span>
        <h5 class="subTitle">Get early access to our most exclusive deals...</h5>
        <form id="emailForm">
            @csrf
            <div class="input-group mb-3">
                <input type="email" class="form-control mt-3" id="emailAddress" name="email"
                    placeholder="Enter your email" required>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </form>
    </div>
</div>

<div id="popupButton" class="popup-button">
    <button onclick="showPopup()" class="btn btn-primary">Subscribe</button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var emailPopup = document.getElementById('emailPopup');
        var closePopup = document.getElementById('closePopup');
        var popupButton = document.getElementById('popupButton');

        // Check if the user is already subscribed
        if (!{{ session('subscribed') ? 'true' : 'false' }}) {
            setTimeout(function() {
                emailPopup.style.display = 'block';
            }, 10000);
        }

        // Close the popup and show the button
        closePopup.onclick = function() {
            emailPopup.style.display = 'none';
            popupButton.style.display = 'block';
        }

        // Show the popup when the button is clicked
        window.showPopup = function() {
            emailPopup.style.display = 'block';
            popupButton.style.display = 'none';
        }

        // Handle form submission
        document.getElementById('emailForm').onsubmit = function(e) {
            e.preventDefault();
            var emailAddress = document.getElementById('emailAddress').value;

            $.ajax({
                url: '{{ route("subscribe") }}',
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    email: emailAddress
                },
                success: function(response) {
                    if (response.success) {
                        alert('Thank you for subscribing!');
                        emailPopup.style.display = 'none';
                        popupButton.style.display = 'none';
                    }
                },
                error: function(response) {
                    alert('An error occurred. Please try again.');
                }
            });
        }
    });
</script>