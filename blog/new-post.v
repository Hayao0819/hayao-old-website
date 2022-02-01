import os
import ui
//import eventbus

const (
	win_width  = 300
	win_height = 150
)

struct App {
	mut:
		window       &ui.Window = 0
		first_ipsum  string
		second_ipsum string
		full_name    string
}

fn main(){
	// Check environment
	check_system_env()

	mut app := &App{}
	app.window = ui.window(
		width: win_width
		height: win_height
		mode: .resizable
		on_resize: fn (width int, height int, win &ui.Window){
			// ウィンドウリサイズ時の処理
		}
		title: "ブログの新規記事の作成"
		state: app
		children: [
			ui.column(
				id: "main"
				width: int(ui.stretch)
				alignment: .center
				//spacing: 2
				margin_: 5
				children: [
					ui.row(
						//height: 20
						id: "group_url"
						widths: ui.stretch
						heights: ui.stretch
						children: [
							ui.label(
								id: "url_label"
								text: "Please enter URL"
							)
							ui.textbox(
									id: "url_tb"
									read_only: false
									//min: 1
									max_len: 20
									width: 250
							)
						]
					)
					ui.row(
						//height: 10
						id: "group_title"
						widths: ui.stretch
						heights: ui.stretch
						children: [
							ui.label(
								id: "title_label"
								text: "Please enter the title"
							)
							ui.textbox(
								id: "title_tb"
								read_only: false
								max_len: 20
								width: 250
							)
						]
					)
					ui.column(
						id: "group_create"
						widths: ui.stretch
						heights: ui.stretch
						children: [
							ui.column(
								//spacing: 2
								margin_: 5
								//alignment: .center
								children: [
									ui.button(
										height: 10
										id: "exit_btn"
										text: "Exit"
										radius: .0
										onclick: fn(_ voidptr, b &ui.Button){
											exit(0)
										}
									)
									ui.button(
										height: 10
										id: 'create_btn'
										text: 'Create new article'
										//width: ui.stretch
										radius: .0
										onclick: fn(_ voidptr, b &ui.Button){
											create_article()
										}
									)
								]
							)
						]
					)
				]
			)
		]
	)
	ui.run(app.window)
}

fn create_article(){
	eprintln("まだ実装されてないンゴ")
	exit(0)
}

fn cmd_available(c string) bool{
	mut cmd := ""
	$if windows{
		cmd = "WHERE"
	}$else{
		cmd = "type"
	}

	result := os.execute("${cmd} \"${c}\"")
	return result.exit_code == 0
}

fn check_system_env(){
	mut check := 0
	if ! cmd_available("hugo"){
		eprintln("Hugo command was not found on this computer.")
		check++
	}

	if check != 0{
		exit(1)
	}
	return
}
