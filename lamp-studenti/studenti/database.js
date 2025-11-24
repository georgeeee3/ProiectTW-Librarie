const products = {
    // === CĂRȚI DIN MAIN.HTML ===
    "ysl": {
        title: "World According to Yves Saint Laurentr",
        author: "Nume Autor",
        price: "220,00 lei",
        format: "Paperback",
        isbn: "9780000000001",
        image: "https://nautilus.ro/gallery/pl/65/world-according-to-yves-saint-laurent-1-1.jpg",
        description: "O descriere pentru cartea World According to Yves Saint Laurentr."
    },
    "louis-vuitton": {
        title: "Louis Vuitton Catwalk: The Complete Fashion Collections",
        author: "Nume Autor",
        price: "316,80 lei",
        format: "Paperback",
        isbn: "9780000000002",
        image: "https://nautilus.ro/gallery/pl/66/louis-vuitton-catwalk-the-complete-fashion-collections-1.jpg",
        description: "O descriere pentru cartea Louis Vuitton Catwalk."
    },
    "wild-thing": {
        title: "Wild Thing",
        author: "Nume Autor",
        price: "70,50 lei",
        format: "Paperback",
        isbn: "9780000000003",
        image: "https://nautilus.ro/gallery/pl/73/wild-thing-2-1.jpg",
        description: "O descriere pentru cartea Wild Thing."
    },
    "our-dark-duet": {
        title: "Our Dark Duet",
        author: "Nume Autor",
        price: "85,00 lei",
        format: "Paperback",
        isbn: "9780000000004",
        image: "https://cdn.dc5.ro/img-prod/2219228605-0.jpeg",
        description: "O descriere pentru cartea Our Dark Duet."
    },
    "underground": {
        title: "Underground: Dreams and Degradations in Bucharest",
        author: "Nume Autor",
        price: "140,00 lei",
        format: "Paperback",
        isbn: "9780000000005",
        image: "https://nautilus.ro/gallery/pl/68/underground-1.jpg",
        description: "O descriere pentru cartea Underground: Dreams and Degradations in Bucharest."
    },
    "homework": {
        title: "Homework: A Memoir",
        author: "Nume Autor",
        price: "105,00 lei",
        format: "Paperback",
        isbn: "9780000000006",
        image: "https://nautilus.ro/gallery/pl/72/homework-1.jpg",
        description: "O descriere pentru cartea Homework: A Memoir."
    },
    "murder-midwinter": {
        title: "Murder At Midwinter",
        author: "Nume Autor",
        price: "52,80 lei",
        format: "Paperback",
        isbn: "9780000000007",
        image: "https://nautilus.ro/gallery/pl/73/murder-at-midwinter-1.jpg",
        description: "O descriere pentru cartea Murder At Midwinter."
    },
    "moths": {
        title: "Moths (Penguin Horror)",
        author: "Nume Autor",
        price: "55,00 lei",
        format: "Paperback",
        isbn: "9780000000008",
        image: "https://nautilus.ro/gallery/pl/75/moths-penguin-horror-1.jpg",
        description: "O descriere pentru cartea Moths (Penguin Horror)."
    },
    "we-are-green": {
        title: "We Are Green and Trembling",
        author: "Nume Autor",
        price: "49,99 lei",
        format: "Paperback",
        isbn: "9780000000009",
        image: "https://nautilus.ro/gallery/pl/72/we-are-green-and-trembling-1.jpg",
        description: "O descriere pentru cartea We Are Green and Trembling."
    },
    "castle-knoll-2": {
        title: "Castle Knoll Files 2: How To Seal Your Own Fate",
        author: "Nume Autor",
        price: "65,00 lei",
        format: "Paperback",
        isbn: "9780000000010",
        image: "https://nautilus.ro/gallery/pl/75/castle-knoll-files-2-how-to-seal-your-own-fate-1.jpg",
        description: "O descriere pentru cartea Castle Knoll Files 2."
    },
    "last-kingdom": {
        title: "Last Kingdom",
        author: "Nume Autor",
        price: "63,00 lei",
        format: "Paperback",
        isbn: "9780000000011",
        image: "https://nautilus.ro/gallery/pl/67/last-kingdom-1-1.jpg",
        description: "O descriere pentru cartea Last Kingdom."
    },
    "city-of-fiction": {
        title: "City of Fiction",
        author: "Nume Autor",
        price: "79,20 lei",
        format: "Paperback",
        isbn: "9780000000012",
        image: "https://nautilus.ro/gallery/pl/72/city-of-fiction-1.jpg",
        description: "O descriere pentru cartea City of Fiction."
    },
    "unworthy": {
        title: "Unworthy",
        author: "Nume Autor",
        price: "90,40 lei",
        format: "Paperback",
        isbn: "9780000000013",
        image: "https://nautilus.ro/gallery/pl/71/unworthy-1.jpg",
        description: "O descriere pentru cartea Unworthy."
    },
    "hierarchy-2": {
        title: "Hierarchy 2: Strength of the Few",
        author: "Nume Autor",
        price: "96,00 lei",
        format: "Paperback",
        isbn: "9780000000014",
        image: "https://nautilus.ro/gallery/pl/73/strength-of-the-few-1.jpg",
        description: "O descriere pentru cartea Hierarchy 2: Strength of the Few."
    },
    "witch-queen": {
        title: "Witch Queen Rising",
        author: "Nume Autor",
        price: "88,00 lei",
        format: "Paperback",
        isbn: "9780000000015",
        image: "https://nautilus.ro/gallery/pl/75/witch-queen-rising.jpg",
        description: "O descriere pentru cartea Witch Queen Rising."
    },
    "summer-rolls": {
        title: "Summer Rolls",
        author: "Nume Autor",
        price: "25,00 lei",
        format: "Paperback",
        isbn: "9780000000016",
        image: "https://nautilus.ro/gallery/pl/75/summer-rolls.jpg",
        description: "O descriere pentru cartea Summer Rolls."
    },
    "apple-pearl": {
        title: "Apple and the Pearl",
        author: "Nume Autor",
        price: "39,99 lei",
        format: "Paperback",
        isbn: "9780000000017",
        image: "https://nautilus.ro/gallery/pl/75/apple-and-the-pearl.jpg",
        description: "O descriere pentru cartea Apple and the Pearl."
    },
    "axe-buried": {
        title: "Where the Axe is Buried",
        author: "Nume Autor",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000018",
        image: "https://nautilus.ro/gallery/pl/75/where-the-axe-is-buried.jpg",
        description: "O descriere pentru cartea Where the Axe is Buried."
    },
    "slow-gods": {
        title: "Slow Gods",
        author: "Nume Autor",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000019",
        image: "https://nautilus.ro/gallery/pl/75/slow-gods.jpg",
        description: "O descriere pentru cartea Slow Gods."
    },
    "i-medusa": {
        title: "I, Medusa",
        author: "Nume Autor",
        price: "100,80 lei",
        format: "Paperback",
        isbn: "9780000000020",
        image: "https://nautilus.ro/gallery/pl/74/i-medusa-1.jpg",
        description: "O descriere pentru cartea I, Medusa."
    },
    "jojo1": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 1",
        author: "Hirohiko Araki",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000021",
        image: "https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-71-1.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 1."
    },
    "jojo2": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 2",
        author: "Hirohiko Araki",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000022",
        image: "https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-72-1.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 2."
    },
    "jojo3": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 3",
        author: "Hirohiko Araki",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000023",
        image: "https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-73-1.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 3."
    },
    "jojo4": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 4",
        author: "Hirohiko Araki",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000024",
        image: "https://m.media-amazon.com/images/I/81Gxv5jzH4L._SL1500_.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 4."
    },
    "jojo5": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 5",
        author: "Hirohiko Araki",
        price: "120,00 lei",
        format: "Paperback",
        isbn: "9780000000025",
        image: "https://m.media-amazon.com/images/I/81AzmasR3qL._SL1500_.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 5."
    },
    "jojo6": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 6",
        author: "Hirohiko Araki",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000026",
        image: "https://m.media-amazon.com/images/I/81BMT+PjP5L._SL1500_.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 6."
    },
    "jojo7": {
        title: "JoJo's Bizarre Adv. Part 7 Vol 7",
        author: "Hirohiko Araki",
        price: "105,60 lei",
        format: "Paperback",
        isbn: "9780000000027",
        image: "https://m.media-amazon.com/images/I/81R0VMoaGjL._SL1500_.jpg",
        description: "O descriere pentru cartea JoJo's Bizarre Adv. Part 7 Vol 7."
    },
    
    // === CĂRȚI DIN NEW-IN.HTML ===
    "satantango": {
        title: "Satantango",
        author: "Nume Autor",
        price: "58,40 lei",
        format: "Paperback",
        isbn: "9780000000028",
        image: "https://nautilus.ro/gallery/pl/50/satantango-new-edition.png",
        description: "O descriere pentru cartea Satantango."
    },
    "seiobo": {
        title: "Seiobo There Below",
        author: "Nume Autor",
        price: "64,00 lei",
        format: "Paperback",
        isbn: "9780000000029",
        image: "https://nautilus.ro/gallery/pl/75/seiobo-there-below-1.jpg",
        description: "O descriere pentru cartea Seiobo There Below."
    },
    "a-mountain": {
        title: "A Mountain to the North, A Lake to The South...",
        author: "Nume Autor",
        price: "52,80 lei",
        format: "Paperback",
        isbn: "9780000000030",
        image: "https://nautilus.ro/gallery/pl/68/a-mountain-to-the-north-a-lake-to-the-south-paths-to-the-west-a-river-to-the-1.jpg",
        description: "O descriere pentru cartea A Mountain to the North..."
    },
    "poem-winter": {
        title: "A Poem for Every Winter Day",
        author: "Nume Autor",
        price: "48,00 lei",
        format: "Paperback",
        isbn: "9780000000031",
        image: "https://nautilus.ro/gallery/pl/73/a-poem-for-every-winter-day-1.jpg",
        description: "O descriere pentru cartea A Poem for Every Winter Day."
    },
    "prince-of-sin-2": {
        title: "A Prince of Sin 2: Throne of Secrets",
        author: "Nume Autor",
        price: "52,80 lei",
        format: "Paperback",
        isbn: "9780000000032",
        image: "https://nautilus.ro/gallery/pl/75/a-prince-of-sin-2-throne-of-secrets-1.jpg",
        description: "O descriere pentru cartea A Prince of Sin 2."
    },
    "tale-unasked": {
        title: "A Tale Unasked",
        author: "Nume Autor",
        price: "68,80 lei",
        format: "Paperback",
        isbn: "9780000000033",
        image: "https://nautilus.ro/gallery/pl/75/a-tale-unasked-1.jpg",
        description: "O descriere pentru cartea A Tale Unasked."
    },
    "age-of-revolutions": {
        title: "Age of Revolutions: Progress and Backlash...",
        author: "Nume Autor",
        price: "68,80 lei",
        format: "Paperback",
        isbn: "9780000000034",
        image: "https://nautilus.ro/gallery/pl/75/age-of-revolutions-progress-and-backlash-from-1600-to-the-present.jpg",
        description: "O descriere pentru cartea Age of Revolutions."
    },
    "all-the-fear": {
        title: "All the Fear of the Fair: Uncanny Tales...",
        author: "Nume Autor",
        price: "58,40 lei",
        format: "Paperback",
        isbn: "9780000000035",
        image: "https://nautilus.ro/gallery/pl/75/all-the-fear-of-the-fair-uncanny-tales-of-circus-and-sideshow-british-library.jpg",
        description: "O descriere pentru cartea All the Fear of the Fair."
    },
    "river-drags-her": {
        title: "And the River Drags Her Down (Special Edition)",
        author: "Nume Autor",
        price: "92,80 lei",
        format: "Hardback",
        isbn: "9780000000036",
        image: "https://nautilus.ro/gallery/pl/74/and-the-river-drags-her-down-special-edition-1.jpg",
        description: "O descriere pentru cartea And the River Drags Her Down."
    },
    "anime-archives": {
        title: "Anime Archives: A retrospective...",
        author: "Nume Autor",
        price: "184,80 lei",
        format: "Hardback",
        isbn: "9780000000037",
        image: "https://nautilus.ro/gallery/pl/73/anime-archives-1.jpg",
        description: "O descriere pentru cartea Anime Archives."
    },
    "artists-colour-box": {
        title: "Artist's Colour Box",
        author: "Nume Autor",
        price: "88,00 lei",
        format: "Box",
        isbn: "9780000000038",
        image: "https://nautilus.ro/gallery/pl/75/artists-colour-box.jpg",
        description: "O descriere pentru cartea Artist's Colour Box."
    },
    "asterix": {
        title: "Asterix in Lusitania",
        author: "Nume Autor",
        price: "64,00 lei",
        format: "Hardback",
        isbn: "9780000000039",
        image: "https://nautilus.ro/gallery/pl/75/asterix-in-lusitania-1.jpg",
        description: "O descriere pentru cartea Asterix in Lusitania."
    }
    

};