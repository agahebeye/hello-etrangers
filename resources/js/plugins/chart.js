import {
    Chart, Legend, Title,
    Tooltip,
    DoughnutController, ArcElement,
    LinearScale, LineElement,
    LineController, CategoryScale, PointElement
} from "chart.js"

Chart.register(
    Legend, Title, Tooltip,
    DoughnutController, ArcElement,
    LinearScale, LineElement,
    LineController, CategoryScale, PointElement,
)

Chart.defaults.plugins.title.display = true
