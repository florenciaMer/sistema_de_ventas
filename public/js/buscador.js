document.addEventListener('keyup', e=>{
    if(e.target.matches('#buscador')){
        document.querySelectorAll('.articulo').forEach(elemento =>{
            elemento.textContent.toLocaleLowerCase().includes(e.target.includes.toLocaleLowerCase())?
            elemento.classList.remove('filtro'):
            elemento.add('filtro');
        })
    }
})