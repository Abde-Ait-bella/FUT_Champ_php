const card = document.createElement('div')
const popup_cards = document.getElementsByClassName('popup_cards')
const popup_background = document.getElementsByClassName('popup_background')
const div_detaille = document.createElement('div')
const p = document.createElement('p')
const div_detaille_elem = document.createElement('div')
const div_natio_club = document.createElement('div')
const div_position = document.createElement('div')
const div_position_left = document.createElement('div')
const div_position_right = document.createElement('div')
const img = document.createElement('img')
const div = document.createElement('div')
const img_card = document.createElement('img')
const card_container = document.querySelectorAll('#card')
const listPopup = document.querySelectorAll('#listPopup')
const p_detaille = document.createElement('p')

const toggle = () => {
  nav.classList.toggle('telephone:w-1/12')

  if (nav.classList.contains('desktop:w-96')) {
    nav.classList.replace('desktop:w-96', 'desktop:w-14')
    console.log('test')

    terrain.classList.replace('bg-right', 'bg-center')
    terrain.classList.replace('w-8/12', 'w-11/12')
    players_container.classList.replace('w-80', 'w-2')
  } else {
    nav.classList.replace('desktop:w-14', 'desktop:w-96')
    terrain.classList.replace('bg-center', 'bg-right')
    terrain.classList.replace('w-11/12', 'w-8/12')
    players_container.classList.replace('w-2', 'w-80')
  }

  if (form.style.opacity == 1 || !form.style.opacity) {
    icone_previus.classList?.replace('fa-arrow-left', 'fa-bars')
    form.style.opacity = 0
  } else {
    icone_previus.classList.replace('fa-bars', 'fa-arrow-left')
    form.style.opacity = 1
  }
}
const berger_menu = document.getElementById('berger_menu')
const icone_previus = berger_menu.childNodes[0].nextSibling
const nav = document.getElementById('left_bar')
const terrain = document.getElementById('terrain')
const form = document.getElementById('form')
const players_container = document.getElementById('players_container')
berger_menu.addEventListener('click', toggle)

let data
async function fetch_data (position) {
  const response = await fetch('./DAO/allData.php')
  const res = await response.json()
  return (data = res)
}

let cardSelected

const appendCard = event => {
  console.log(
    event.currentTarget.children[0],
    cardSelected.children[0].children[0]
  )
  const cardListClicked = event.currentTarget.children[0].cloneNode(true)
  cardSelected.children[0].children[0].replaceWith(cardListClicked)
  event.currentTarget.style.display = 'none'
  popup_cards[0].classList.replace('grid', 'hidden')
  popup_background[0].classList.replace('grid', 'hidden')
}

const createCard = () => {
  card.classList.add('card')
  card.setAttribute('id', 'listPopup')
  div_detaille.classList.add('card_detaille')
  div_detaille_elem.classList.add('card_detaille_elem')
  p.classList.add('card_paragraph')
  div_position.classList.add('card_position')
  img_card.classList.add('card_image')
  const div = document.createElement('div')
  div.classList.add('relative')
  div.classList.add('w-full')
  div.classList.add('grid')
  div.classList.add('justify-center')
  div_natio_club.classList.add('flex')
  div_natio_club.classList.add('gap-2')
  div_natio_club.classList.add('items-center')
  div_natio_club.classList.add('div_natio_club')

  div_position.appendChild(div_position_left)
  div_position.appendChild(div_position_right)

  div_detaille.appendChild(p)
  div_detaille.appendChild(div_detaille_elem)
  div_detaille.appendChild(div_natio_club)

  div.appendChild(div_position)
  div.appendChild(div_detaille)
  card.append(div)
  div_position.children[0].classList.add('card_rating')
}

const fill_cards = event => {
  cardSelected = event.currentTarget
  const position = cardSelected.getAttribute('position')

  popup_cards[0].classList.replace('hidden', 'grid')
  popup_background[0].classList.replace('hidden', 'grid')

  createCard()

  fetch_data().then(() => {
    data.forEach(data => {
      const cardElement = card.cloneNode(true)
      console.log(cardElement.children[0].children[1].children[0]);
      
      cardElement.children[0].children[1].children[0].textContent =
        data.player_name.toLocaleLowerCase().split(' ')[0]
      cardElement.children[0].children[0].children[0].textContent = Math.floor(
        data.player_rating
      )
      cardElement.children[0].children[0].children[1].textContent =
        data.player_position
      img_card.src = data.photo ? data.photo.replace("../uploads/", "./uploads/") : "";

      cardElement.children[0].appendChild(img_card.cloneNode(true))

      stats[data.player_position == 'GK' ? 1 : 0].forEach(stat => {
        const divStat = div.cloneNode(true)
        const pStat = p_detaille.cloneNode(true)

        pStat.textContent = Math.floor(data[stat[1]])

        divStat.textContent += stat[0]
        divStat.appendChild(pStat)

        cardElement.children[0].children[1].children[1].appendChild(divStat)
      })

      // if (position === 'CM' && index === 1) {
      //   cardElement.style.marginTop = '1rem'
      // }

      const img_nationality = img.cloneNode(true)
      img_nationality.src = data.N_Image.replace(/&amp;/g, '&')

      const img_club = img.cloneNode(true)
      img_club.src = `${data.team_image.replace(/&amp;/g, '&')}`

      cardElement.children[0].children[1].children[2].appendChild(
        img_nationality
      )
      cardElement.children[0].children[1].children[2].appendChild(img_club)
      cardElement.children[0].children[1].children[2].appendChild(img_club)
      cardElement.addEventListener('click', appendCard)

      if (data.player_position == position) {
        //   // const test =data.filter((e)=> e.player_position == position);
      }
      popup_cards[0].appendChild(cardElement)
    })
  })
}

var stats = [
  [
    ['PC', 'player_pace'],
    ['SH', 'player_shooting'],
    ['PS', 'player_passing'],
    ['DR', 'player_dribbling'],
    ['DE', 'player_defending'],
    ['PH', 'player_physical']
  ],
  [
    ['DV', 'player_pace'],
    ['HD', 'player_shooting'],
    ['KC', 'player_passing'],
    ['REF', 'player_dribbling'],
    ['SP', 'player_defending'],
    ['PS', 'player_physical']
  ]
]

Array.from(card_container).map(e => {
  e.addEventListener('click', fill_cards)
})
popup_background[0].addEventListener('click', () => {
  popup_cards[0].classList.replace('grid', 'hidden')
  popup_background[0].classList.replace('grid', 'hidden')
})

window.addEventListener('load', fetch_data);

