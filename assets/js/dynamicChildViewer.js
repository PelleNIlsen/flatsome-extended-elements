const container = document.getElementById('container');
const buttonsContainer = document.getElementById('buttons');
const children = container.querySelectorAll('.fee-child-content-container');

children.forEach((child, index) => {
    if (index === 0) child.style.display = 'block';
    else child.style.display = 'none';
});

children.forEach((child, index) => {
    const button = document.createElement('button');
    const span1 = document.createElement('span');
    const span2 = document.createElement('span');
    button.append(span1, span2);
    button.style.display = 'grid';
    button.style.gap = '5px';
    button.style.setProperty('padding', '8px 16px');
    button.style.setProperty('margin', '0');
    button.classList.add('button', 'secondary', 'fee-toggle-buttons');
    span1.innerText = child.dataset.text;
    span1.style.fontSize = '1rem';
    span1.style.fontWeight = 'bold';
    span1.classList.add('fee-toggle-button-title');
    span2.innerText = child.dataset.undertext;
    span2.style.fontSize = '0.8rem';
    span2.classList.add('fee-toggle-button-subtitle');
    index == 0 ? '' : button.classList.add('is-outline');
    button.addEventListener('click', () => {
        buttonsContainer.querySelectorAll('.button').forEach((j, k) => {
            j.classList.add('is-outline');
        });
        button.classList.remove('is-outline');
        children.forEach((c, i) => {
            c.style.display = i === index ? 'block' : 'none';
        });
    });
    buttonsContainer.appendChild(button);
});