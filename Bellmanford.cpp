#include<iostream>
#include<cstdio>
using namespace std;
int bellman_ford(int g[20][20],int v,int e,int edg[20][2])
{
int i,U,V,k,dis[20],par[20],s,flag=1;
for(i=0;i<v;i++)
    dis[i]=1000;par[i]=-1;
    cout<<"enter source"<<endl;
    cin>>s;
    dis[s-1]=0;
    for(i=0;i<v-1;i++){
        for(k=0;k<e;k++){
            U=edg[k][0];V=edg[k][1];
            if(dis[U]+g[U][V]<dis[V])
            dis[V]=dis[U]+g[U][V];par[V]=U;
        }
    }
for(k=0;k<e;k++){
    U=edg[k][0];V=edg[k][1];
    if(dis[U]+g[U][V]<dis[V]) flag=0;
}
if(flag) cout<<"vertex"<<i+1<<"cost"<<dis[i]<<"parent"<<par[i]+1;

return flag;
}
int main(){
    int vertics,edge[20][2],grap[20][20],i,j,k=0;
    cout<<"Enter number of vertics: "<<endl;
    cin>>vertics;
    cout<<"Enter graph in matrix form: "<<endl;
    for(i=0;i<vertics;i++)
    {
        for(j=0;j<vertics;j++){
            cin>>grap[i][j];
            if(grap[i][j]!=0){
                edge[k][0]=i;edge[k++][1]=j;
            }
        }
    }
    if(bellman_ford(grap,vertics,k,edge))
        cout<<"negative weight cycle"<<endl;
    else cout<<"negative weight cycle"<<endl;
    return 0;
}
