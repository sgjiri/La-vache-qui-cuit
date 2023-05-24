let ingredient = document.getElementById('ingredient')
console.log(ingredient)
let form = document.getElementById('form')
ingr.addEventListener('click', function(e) {
    let newQuantityLabel = document.createElement('label');
    let newQuantityInput = document.createElement('input');
    let newUnityLabel = document.createElement('label');
    let newUnityInput = document.createElement('input');
    let newIngredientLabel = document.createElement('label');
    let newIngredientInput = document.createElement('input');
    form.appendChild(newQuantityLabel);
    form.appendChild(newQuantityInput);
    form.appendChild(newUnityLabel);
    form.appendChild(newUnityInput);
    form.appendChild(newIngredientLabel);
    form.appendChild(newIngredientInput);
});