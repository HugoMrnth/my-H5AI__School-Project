console.log('hello world')
let lis = document.querySelectorAll('.li')

lis.forEach(li => {
    li.addEventListener('click', (e) => {
        e.stopPropagation()
        // e.preventDefault()
        console.log(li)
        li.children[2].classList.toggle('open')

    })
})

let links = document.querySelectorAll('.link')

links.forEach(link => {
    link.addEventListener('click', (e) => {
        console.log(e.target.dataset.target)
        let target = document.getElementById(e.target.dataset.target)
        console.log(target)
        target.style.display = 'block'
        let btnClose = document.querySelector('.btn-close')
        btnClose.addEventListener('click', (e) => {
            target.style.display ='none'
        })
    })
})

