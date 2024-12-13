const fill_RB_card = () => {

    const RB = document.getElementById('card_4');

    const card_RB = card.cloneNode(true)
    const RB_data = data.RB.filter((d) => d.active == true).slice(0, 1)

    if (RB_data.length !== 0) {

        card_RB.children[0].children[1].children[0].textContent = RB_data[0].name.toLocaleLowerCase().split(" ")[0]
        card_RB.children[0].children[0].children[0].textContent = RB_data[0].rating;
        card_RB.children[0].children[0].children[1].textContent = RB_data[0].position;
        img_card.src = RB_data[0].photo;
        card_RB.children[0].appendChild(img_card.cloneNode(true));

        stats.map((stat) => {
            const div_reserve = div.cloneNode(true);
            const p_resreve = p_detaille.cloneNode(true);
            p_resreve.textContent = RB_data[0][stat[1]];
            div_reserve.textContent += stat[0];
            div_reserve.appendChild(p_resreve)
            card_RB.children[0].children[1].children[1].appendChild(div_reserve);
        })

        card_RB.style.left = formations[window.localStorage.getItem('formation')][4].left;
        card_RB.style.bottom = formations[window.localStorage.getItem('formation')][4].bottom;

        RB.children[0] ? RB.children[0].replaceWith(card_RB) : RB.appendChild(card_RB)

    }
}

const fill_GK_card = () => {


    const GK = document.getElementById('card_0');

    const card_GK = card.cloneNode(true)

    const GK_data = data.GK.filter((d) => d.active == true)

    var stats = [
        ['DV', 'diving'],
        ['HD', 'handling'],
        ['KC', 'kicking'],
        ['REF', 'reflexes'],
        ['SP', 'speed'],
        ['PS', 'positioning'],
    ]

    if (GK_data.length !== 0) {

        card_GK.children[0].children[0].children[0].textContent = GK_data[0].rating;
        card_GK.children[0].children[0].children[1].textContent = GK_data[0].position;
        card_GK.children[0].children[1].children[0].textContent = GK_data[0].name.toLocaleLowerCase().split(" ")[0];
        img_card.src = GK_data[0].photo;
        card_GK.children[0].appendChild(img_card.cloneNode(true));

        stats.map((stat) => {
            const div_reserve = div.cloneNode(true);
            const p_resreve = p_detaille.cloneNode(true);
            p_resreve.textContent = GK_data[0][stat[1]];
            div_reserve.textContent += stat[0];
            div_reserve.appendChild(p_resreve)
            card_GK.children[0].children[1].children[1].appendChild(div_reserve);
        })
        img.classList.add('w-[20px]');
        img.classList.add('h-fit');

        const img_nationalite = img.cloneNode(true);
        img_nationalite.src = GK_data[0].nationality.replace(/&amp;/g, '&');

        const img_club = img.cloneNode(true);
        img_club.src = GK_data[0].club.replace(/&amp;/g, '&');

        card_GK.children[0].children[1].children[2].appendChild(img_nationalite);
        card_GK.children[0].children[1].children[2].appendChild(img_club);

        card_GK.style.left = formations[window.localStorage.getItem('formation')][0].left
        card_GK.style.bottom = formations[window.localStorage.getItem('formation')][0].bottom

        GK.children[0] ? GK.children[0].replaceWith(card_GK) : GK.appendChild(card_GK);
    }
}

const fill_all_card = () => {

    const position = []
    const data_filter = []
    const container_card = []

    for (let i = 0; i < array.length; i++) {

        const GK = document.getElementById(`card_${0}`);

        position[i] = card.cloneNode(true)

        data_filter[i] = data.GK.filter((d) => d.active == true)

        var stats = [
            [
                ['DV', 'diving'],
                ['HD', 'handling'],
                ['KC', 'kicking'],
                ['REF', 'reflexes'],
                ['SP', 'speed'],
                ['PS', 'positioning']
            ],
            [
                ['DV', 'diving'],
                ['HD', 'handling'],
                ['KC', 'kicking'],
                ['REF', 'reflexes'],
                ['SP', 'speed'],
                ['PS', 'positioning']
            ],
        ]

        if (data_filter[i].length !== 0) {

            position[i].children[0].children[0].children[0].textContent = data_filter[i][0].rating;
            position[i].children[0].children[0].children[1].textContent = data_filter[i][0].position;
            position[i].children[0].children[1].children[0].textContent = data_filter[i][0].name.toLocaleLowerCase().split(" ")[0];
            img_card.src = data_filter[i][0].photo;
            position[i].children[0].appendChild(img_card.cloneNode(true));

            stats.map((stat) => {
                const div_reserve = div.cloneNode(true);
                const p_resreve = p_detaille.cloneNode(true);
                p_resreve.textContent = data_filter[i][0][stat[1]];
                div_reserve.textContent += stat[0];
                div_reserve.appendChild(p_resreve)
                position[i].children[0].children[1].children[1].appendChild(div_reserve);
            })
            img.classList.add('w-[20px]');
            img.classList.add('h-fit');

            const img_nationalite = img.cloneNode(true);
            img_nationalite.src = data_filter[i][0].nationality.replace(/&amp;/g, '&');

            const img_club = img.cloneNode(true);
            img_club.src = data_filter[i][0].club.replace(/&amp;/g, '&');

            position[i].children[0].children[1].children[2].appendChild(img_nationalite);
            position[i].children[0].children[1].children[2].appendChild(img_club);

            position[i].style.left = formations[window.localStorage.getItem('formation')][i].left
            position[i].style.bottom = formations[window.localStorage.getItem('formation')][i].bottom

            container_card.children[0] ? container_card.children[0].replaceWith(position[i]) : container_card.appendChild(position[i]);
        }
    }
}


const fill_RB_card = () => {

    const RB = document.getElementById('card_4');

    const card_RB = card.cloneNode(true)
    const RB_data = data.RB.filter((d) => d.active == true).slice(0, 1)

    if (RB_data.length !== 0) {

        card_RB.children[0].children[1].children[0].textContent = RB_data[0].name.toLocaleLowerCase().split(" ")[0]
        card_RB.children[0].children[0].children[0].textContent = RB_data[0].rating;
        card_RB.children[0].children[0].children[1].textContent = RB_data[0].position;
        img_card.src = RB_data[0].photo;
        card_RB.children[0].appendChild(img_card.cloneNode(true));

        stats.map((stat) => {
            const div_reserve = div.cloneNode(true);
            const p_resreve = p_detaille.cloneNode(true);
            p_resreve.textContent = RB_data[0][stat[1]];
            div_reserve.textContent += stat[0];
            div_reserve.appendChild(p_resreve)
            card_RB.children[0].children[1].children[1].appendChild(div_reserve);
        })

        card_RB.style.left = formations[window.localStorage.getItem('formation')][4].left;
        card_RB.style.bottom = formations[window.localStorage.getItem('formation')][4].bottom;

        RB.children[0] ? RB.children[0].replaceWith(card_RB) : RB.appendChild(card_RB)

    }
}

const fill_CB_card = () => {

    const CB_data = data.CB.filter((d) => d.active == true).slice(0, 2)

    if (CB_data.length !== 0) {

        for (let index = 0; index < CB_data.length; index++) {

            const card_CB = card.cloneNode(true);
            card_CB.children[0].children[1].children[0].textContent = CB_data[index].name.toLocaleLowerCase().split(" ")[0]
            card_CB.children[0].children[0].children[0].textContent = CB_data[index].rating;
            card_CB.children[0].children[0].children[1].textContent = CB_data[index].position;
            img_card.src = CB_data[0].photo;
            card_CB.children[0].appendChild(img_card.cloneNode(true));

            stats.map((stat, i) => {
                const div_reserve = div.cloneNode(true);
                const p_resreve = p_detaille.cloneNode(true);

                p_resreve.textContent = CB_data[index][stat[1]];
                div_reserve.textContent += stat[0];
                div_reserve.appendChild(p_resreve)

                card_CB.children[0].children[1].children[1].appendChild(div_reserve);

            })

            card_CB.style.left = formations[window.localStorage.getItem('formation')][index + 2].left;
            card_CB.style.bottom = formations[window.localStorage.getItem('formation')][index + 2].bottom;

            terrain.children[index + 2].children[0] ? terrain.children[index + 2].children[0].replaceWith(card_CB) : terrain.children[index + 2].appendChild(card_CB)

        }
    }
}

const fill_CM_card = () => {

    const CM_data = data.CM.filter((d) => d.active == true).splice(0, 3)

    if (CM_data.length !== 0) {

        CM_data.map((e, i) => {

            const card_CM = card.cloneNode(true);
            card_CM.children[0].children[1].children[0].textContent = CM_data[i].name.toLocaleLowerCase().split(" ")[0]
            card_CM.children[0].children[0].children[0].textContent = CM_data[i].rating;
            card_CM.children[0].children[0].children[1].textContent = CM_data[i].position;
            img_card.src = CM_data[0].photo;
            card_CM.children[0].appendChild(img_card.cloneNode(true));

            stats.map((stat) => {
                const div_reserve = div.cloneNode(true);
                const p_resreve = p_detaille.cloneNode(true);
                p_resreve.textContent = CM_data[i][stat[1]];
                div_reserve.textContent += stat[0];
                div_reserve.appendChild(p_resreve)
                card_CM.children[0].children[1].children[1].appendChild(div_reserve);
            })

            i === 1 ? card_CM.style.marginTop = "1rem" : "";


            card_CM.style.left = formations[window.localStorage.getItem('formation')][i + 5].left;
            card_CM.style.bottom = formations[window.localStorage.getItem('formation')][i + 5].bottom;

            terrain.children[i + 5].children[0] ? terrain.children[i + 5].children[0].replaceWith(card_CM) : terrain.children[i + 5].appendChild(card_CM)

        })
    }
}

const fill_ST_card = () => {

    const card_ST = card.cloneNode(true)
    const ST_data = data.ST.filter((d) => d.active == true).slice(0, 1)

    if (ST_data.length !== 0) {

        card_ST.children[0].children[1].children[0].textContent = ST_data[0].name.toLocaleLowerCase().split(" ")[0]
        card_ST.children[0].children[0].children[0].textContent = ST_data[0].rating;
        card_ST.children[0].children[0].children[1].textContent = ST_data[0].position;
        img_card.src = ST_data[0].photo;
        card_ST.children[0].appendChild(img_card.cloneNode(true));

        stats.map((stat) => {
            const div_reserve = div.cloneNode(true);
            const p_resreve = p_detaille.cloneNode(true);
            p_resreve.textContent = ST_data[0][stat[1]];
            div_reserve.textContent += stat[0];
            div_reserve.appendChild(p_resreve)
            card_ST.children[0].children[1].children[1].appendChild(div_reserve);
        })

        card_ST.style.left = formations[window.localStorage.getItem('formation')][9].left;
        card_ST.style.bottom = formations[window.localStorage.getItem('formation')][9].bottom;

        terrain.children[9].children[0] ? terrain.children[9].children[0].replaceWith(card_ST) : terrain.children[9].appendChild(card_ST)
    }
}

const fill_RW_card = () => {

    const card_RW = card.cloneNode(true)
    const RW_data = data.RW.filter((d) => d.active == true).slice(0, 1)

    if (RW_data.length !== 0) {

        card_RW.children[0].children[1].children[0].textContent = RW_data[0].name.toLocaleLowerCase().split(" ")[0]
        card_RW.children[0].children[0].children[0].textContent = RW_data[0].rating;
        card_RW.children[0].children[0].children[1].textContent = RW_data[0].position;
        img_card.src = RW_data[0].photo; card_RW.children[0].appendChild(img_card.cloneNode(true));

        stats.map((stat) => {
            const div_reserve = div.cloneNode(true);
            const p_resreve = p_detaille.cloneNode(true);
            p_resreve.textContent = RW_data[0][stat[1]];
            div_reserve.textContent += stat[0];
            div_reserve.appendChild(p_resreve)
            card_RW.children[0].children[1].children[1].appendChild(div_reserve);
        })

        card_RW.style.left = formations[window.localStorage.getItem('formation')][10].left;
        card_RW.style.bottom = formations[window.localStorage.getItem('formation')][10].bottom;

        ;
        terrain.children[10].children[0] ? terrain.children[10].children[0].replaceWith(card_RW) : terrain.children[10].appendChild(card_RW)
    }
}

const fill_LW_card = () => {

    const card_LW = card.cloneNode(true)
    const LW_data = data.LW.filter((d) => d.active == true).slice(0, 1)

    if (LW_data.length !== 0) {

        card_LW.children[0].children[1].children[0].textContent = LW_data[0].name.toLocaleLowerCase().split(" ")[0]
        card_LW.children[0].children[0].children[0].textContent = LW_data[0].rating;
        card_LW.children[0].children[0].children[1].textContent = LW_data[0].position;
        img_card.src = LW_data[0].photo; card_LW.children[0].appendChild(img_card.cloneNode(true));

        stats.map((stat) => {
            const div_reserve = div.cloneNode(true);
            const p_resreve = p_detaille.cloneNode(true);
            p_resreve.textContent = LW_data[0][stat[1]];
            div_reserve.textContent += stat[0];
            div_reserve.appendChild(p_resreve)
            card_LW.children[0].children[1].children[1].appendChild(div_reserve);
        })

        card_LW.style.left = formations[window.localStorage.getItem('formation')][8].left;
        card_LW.style.bottom = formations[window.localStorage.getItem('formation')][8].bottom;

        terrain.children[8].children[0] ? terrain.children[8].children[0].replaceWith(card_LW) : terrain.children[8].appendChild(card_LW)
    }
}

blob:http://127.0.0.1:5500/0f4a6da6-3896-49f1-8522-82d3f50c6079
blob:http://127.0.0.1:5500/f4d297b1-e2ef-40a2-bf8d-49515a5712ce