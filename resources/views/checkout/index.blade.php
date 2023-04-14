@php
$user = Auth::user();
@endphp

<x-layout>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-12 gap-4">
        <x-orderaddressdetails :user="$user" :orderid="$id" />

        <x-orderinvoicedetails :user="$user" :orderid="$id" />
</x-layout>

<script>
    const agreeCheckbox = document.getElementById('checkbox3');
    const conditionalForm = document.getElementById('conditionalForm');

    agreeCheckbox.addEventListener('change', function() {
        if (this.checked) {
            conditionalForm.style.display = 'none';
        } else {
            conditionalForm.style.display = 'block';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Function to enable or disable the button based on checkbox state
        function updateButtonState(checkboxId, buttonId) {
            var checkbox = document.getElementById(checkboxId);
            var button = document.getElementById(buttonId);

            if (checkbox.checked) {
                button.removeAttribute('disabled');
                button.style.opacity = '1';
                button.style.cursor = 'pointer';
            } else {
                button.setAttribute('disabled', true);
                button.style.opacity = '0.5';
                button.style.cursor = 'not-allowed';
            }
        }

        // Function to check if both checkboxes are checked
        function checkBothCheckboxes() {
            var checkbox1 = document.getElementById('checkbox1');
            var checkbox3 = document.getElementById('checkbox3');

            var button1 = document.getElementById('myButton1');
            var button2 = document.getElementById('myButton2');

            if (checkbox1.checked && checkbox3.checked) {
                button1.removeAttribute('disabled');
                button1.style.opacity = '1';
                button1.style.cursor = 'pointer';

            } else {
                button1.setAttribute('disabled', true);
                button1.style.opacity = '0.5';
                button1.style.cursor = 'not-allowed';

            }
        }

        // Add event listeners for each form's checkbox change
        document.getElementById('checkbox1').addEventListener('change', function() {
            updateButtonState('checkbox1', 'myButton1');
            checkBothCheckboxes();
        });

        document.getElementById('checkbox3').addEventListener('change', function() {
            updateButtonState('checkbox3', 'myButton1');
            checkBothCheckboxes();
        });

        document.getElementById('checkbox2').addEventListener('change', function() {
            updateButtonState('checkbox2', 'myButton2');
            checkBothCheckboxes();
        });

        // Trigger the events once the DOM content is loaded
        updateButtonState('checkbox1', 'myButton1');
        updateButtonState('checkbox2', 'myButton2');
        updateButtonState('checkbox3', 'myButton1');
        checkBothCheckboxes();
    });
</script>