import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;


public class TestViewMember {
    public void view(){

        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        //to view members the user should be either an it head or admin
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/viewMember.php");

        try{
            WebElement view =driver.findElement(By.id("member"));
            System.out.println("TEST VIEW PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST VIEW FAILED");

        }
        driver.close();
    }
}
