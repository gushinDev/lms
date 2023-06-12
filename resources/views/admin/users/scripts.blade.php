<script>
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const confirmed = confirm('Вы уверены, что хотите удалить?');
            if (confirmed) {
                const form = button.closest('form');
                form.submit();
            }
        });
    });

</script>
