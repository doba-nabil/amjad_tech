document.addEventListener('DOMContentLoaded', function() {
    function handleAjaxForm(formSelector, successMessageContainer) {
        const forms = document.querySelectorAll(formSelector);
        
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(form);
                const submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
                const originalBtnText = submitBtn ? submitBtn.value || submitBtn.innerHTML : '';
                
                if (submitBtn) {
                    if (submitBtn.tagName === 'INPUT') submitBtn.value = 'Sending...';
                    else submitBtn.innerHTML = 'Sending...';
                    submitBtn.disabled = true;
                }

                // Remove previous error messages
                form.querySelectorAll('.ajax-error').forEach(el => el.remove());

                fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok && response.status !== 422) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.errors) {
                        // Display validation errors
                        Object.keys(data.errors).forEach(key => {
                            const input = form.querySelector(`[name="${key}"]`);
                            if (input) {
                                const errorDiv = document.createElement('div');
                                errorDiv.className = 'ajax-error text-danger mt-1';
                                errorDiv.innerText = data.errors[key][0];
                                input.parentNode.appendChild(errorDiv);
                            }
                        });
                    } else if (data.success) {
                        // Display success message
                        form.reset();
                        let successAlert = document.createElement('div');
                        successAlert.className = 'alert alert-success mt-3';
                        successAlert.innerText = data.message;
                        
                        if (successMessageContainer) {
                            const container = form.closest(successMessageContainer);
                            if(container) container.prepend(successAlert);
                            else form.prepend(successAlert);
                        } else {
                            form.prepend(successAlert);
                        }
                        
                        setTimeout(() => successAlert.remove(), 5000);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    let errorAlert = document.createElement('div');
                    errorAlert.className = 'alert alert-danger mt-3';
                    errorAlert.innerText = 'An error occurred. Please try again.';
                    form.prepend(errorAlert);
                    setTimeout(() => errorAlert.remove(), 5000);
                })
                .finally(() => {
                    if (submitBtn) {
                        if (submitBtn.tagName === 'INPUT') submitBtn.value = originalBtnText;
                        else submitBtn.innerHTML = originalBtnText;
                        submitBtn.disabled = false;
                    }
                });
            });
        });
    }

    // Initialize ajax forms
    handleAjaxForm('form[action*="contact"]', '.contact-form');
    handleAjaxForm('form[action*="subscribe"]', '.subscribe-form, .newsletter-form');
    handleAjaxForm('form[action*="comment"]', '.comment-form-wrap');
});
