<script>
    const form = document.querySelector('form');
    const inputs = form.querySelectorAll('input');

    inputs.forEach(input => {
        input.addEventListener('input', () => {
            const isFilled = Array.from(inputs).every(input => input.value.trim().length > 0);
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = !isFilled;
        });
    });
</script>
