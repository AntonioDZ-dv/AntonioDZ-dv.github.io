Imports MySql.Data.MySqlClient ' Asegúrate de tener la biblioteca MySQL.Data instalada

Public Class Form2
    Private Sub btnLogin_Click(sender As Object, e As EventArgs) Handles btnLogin.Click
        ' Obtener las credenciales ingresadas por el usuario
        Dim username As String = txtUsername.Text
        Dim password As String = txtPassword.Text

        ' Verificar si el usuario es "admin" y la contraseña es "1234"
        If username = "admin" And password = "1234" Then
            ' Credenciales correctas: abrir el formulario principal para administrador
            Dim mainForm As New Form1()
            mainForm.Show()
            Me.Hide() ' Oculta el formulario de inicio de sesión
        Else
            ' Si no es "admin", verificar en la base de datos
            Dim connectionString As String = "Server=localhost;Database=negocio_ramos;Uid=root;Pwd=kanzakibg;"

            Dim query As String = "SELECT password FROM usuarios WHERE email = @username"

            Using connection As New MySqlConnection(connectionString)
                Try
                    connection.Open()
                    Using command As New MySqlCommand(query, connection)
                        ' Parámetros para evitar inyección SQL
                        command.Parameters.AddWithValue("@username", username)

                        ' Ejecutar consulta
                        Using reader As MySqlDataReader = command.ExecuteReader()
                            If reader.Read() Then
                                Dim storedPassword As String = reader("password").ToString()

                                ' Verificar la contraseña ingresada con la almacenada en la base de datos
                                If password = storedPassword Then
                                    ' Credenciales correctas: abrir el formulario principal para usuarios
                                    Dim userForm As New Form3()
                                    userForm.Show()
                                    Me.Hide() ' Oculta el formulario de inicio de sesión
                                Else
                                    ' Contraseña incorrecta
                                    MessageBox.Show("Usuario o contraseña incorrectos.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                                End If
                            Else
                                ' Usuario no encontrado
                                MessageBox.Show("Usuario no encontrado.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                            End If
                        End Using
                    End Using
                Catch ex As Exception
                    ' Manejar errores de conexión o ejecución
                    MessageBox.Show("Error al conectar con la base de datos: " & ex.Message, "Error", MessageBoxButtons.OK, MessageBoxIcon.Error)
                End Try
            End Using
        End If
    End Sub

    Private Sub Form2_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    End Sub

    Private Sub Label1_Click(sender As Object, e As EventArgs) Handles Label1.Click

    End Sub

    Private Sub PictureBox1_Click(sender As Object, e As EventArgs) Handles PictureBox1.Click, PictureBox2.Click

    End Sub
End Class
